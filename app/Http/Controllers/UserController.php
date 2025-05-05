<?php

namespace App\Http\Controllers;

use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Services\ActivityLogService;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    protected $activityLogService;
    public function __construct(ActivityLogService $activityLogService)
    {
        $this->activityLogService = $activityLogService;
        $this->middleware('permission:view user', ['only' => ['index']]);
        $this->middleware('permission:create user', ['only' => ['create','store']]);
        $this->middleware('permission:update user', ['only' => ['update','edit']]);
        $this->middleware('permission:delete user', ['only' => ['destroy']]);
    }

    public function index()
    {
        $users = User::get();
        return view('role-permission.user.index', ['users' => $users]);
    }
    public function getUsers()
    {
        $users = User::with('roles')->get(); // Eager load roles once
    
        // Add encrypted_id to each user
        $users->transform(function ($user) {
            $user->encrypted_id = encrypt($user->id);
            return $user;
        });
    
        return DataTables::of($users)
            ->addColumn('role', function ($user) {
                return $user->getRoleNames()->map(function ($role) {
                    return '<label class="rounded-md bg-bgray-50 px-4 py-1.5 text-sm font-semibold leading-[22px] text-bgray-400 dark:bg-darkblack-500">'
                        . $role . '</label>';
                })->implode(' ');
            })
            ->rawColumns(['role'])
            ->make(true);
    }
    

    // public function create()
    // {
    //     $roles = Role::pluck('name','name')->all();
    //     return view('role-permission.user.create', ['roles' => $roles]);
    // }

    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|max:255|unique:users,email',
    //         'mobile' => 'required|regex:/^\+?[0-9]{8,15}$/|unique:users,mobile',
    //         'password' => 'nullable|string|min:8',
    //         'roles' => 'required',
    //     ]);
    
    //     $user = new User;
    //     $user->name = $validatedData['name'];
    //     $user->email = $validatedData['email'];
    //     $user->mobile = $validatedData['mobile'];
    
    //     if (!empty($validatedData['password'])) {
    //         $user->password = Hash::make($validatedData['password']);
    //     }
    
    //     $user->save();

    //     $this->activityLogService->postlog($request, 'Created a new user');

    //     $user->syncRoles($request->roles);
    
    //     return redirect('/users')->with('success', 'User created successfully with roles');
    // }

    public function edit(User $user)
    {
        $roles = Role::pluck('name','name')->all();
        $userRoles = $user->roles->pluck('name','name')->all();
        return view('role-permission.user.edit', [
            'user' => $user,
            'roles' => $roles,
            'userRoles' => $userRoles
        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|max:20',
            'roles' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if(!empty($request->password)){
            $data += [
                'password' => Hash::make($request->password),
            ];
        }

        $user->update($data);

        $this->activityLogService->postlog($request, 'Updated user');

        $user->syncRoles($request->roles);

        return redirect('/users')->with('success','User Updated Successfully with roles');
    }

    public function destroy($userId)
    {
        $user = User::findOrFail($userId);
        $this->activityLogService->getlog( 'Deleted a user');
        $user->delete();

        return redirect('/users')->with('success','User Delete Successfully');
    }
}