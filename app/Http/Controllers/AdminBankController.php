<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\UserBankModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class AdminBankController extends Controller
{
    public function index()
    {
        $this->authorize('view bank');
        return view('admin-bank.index');
    }
    public function getBanks(Request $request)
    {
        $this->authorize('view bank');
        $UserBankModel = Bank::get();
    
        return DataTables::of($UserBankModel)
            ->addColumn('can_edit', function () {
                return Auth::user()->can('update bank');
            })
            ->make(true);
    }

    public function create()
    {
        $this->authorize('add bank');
        return view('bank.create');
    }

    public function store(Request $request)
    {
        $this->authorize('add bank');
        $validated = $request->validate([
            'account_holder_name' => 'required|string|max:100',
            'account_no' => 'required|string|max:20',
            'ifsc' => 'required|string|max:20',
            'bank_name' => 'required|string|max:100',
            'account_type' => 'required|string|in:Saving,Current'
        ]);
    
        $userBank = new UserBankModel();
        $userBank->user_id = Auth::user()->id;
        $userBank->account_holder_name = $validated['account_holder_name'];
        $userBank->account_no = $validated['account_no'];
        $userBank->ifsc = $validated['ifsc'];
        $userBank->bank_name = $validated['bank_name'];
        $userBank->account_type = $validated['account_type'];
        $userBank->save();
    
        return redirect()->route('banks.index')->with('success', 'Bank details saved successfully!');
    }

    public function edit(UserBankModel $bank)
    {
        $this->authorize('update bank');
        // return view('bank.edit', compact('bank'));
        return view('bank.create',compact('bank'));
    }
    
    public function update(Request $request, UserBankModel $bank)
    {
        $this->authorize('update bank');
        $request->validate([
            'account_holder_name' => 'required|string|max:255',
            'account_no' => 'required|string|max:255',
            'ifsc' => 'required|string|max:255',
            'bank_name' => 'required|string|max:255',
            'account_type' => 'required|string|in:Saving,Current'
        ]);

        $bank->update($request->all());

        return redirect()->route('banks.index')->with('success', 'Bank updated successfully');
    }

}
