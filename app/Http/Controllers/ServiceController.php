<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class ServiceController extends Controller
{
    public function index()
    {
        $this->authorize('view service');
        return view('services.index');
    }

    public function getService(Request $request)
    {
        $Service = Service::with('category')->get();
        // dd($Service);
        return DataTables::of($Service)
            ->addColumn('can_edit', function () {
                return Auth::user()->can('update service');
            })
            ->make(true);
    }
    public function create()
    {
        $this->authorize('create service');
        $categories = ServiceCategory::all();
        return view('services.form', compact('categories', 'categories'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:active,inactive',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('icon')) {
            $iconPath = "serviceIcon/".rand(99999,9999999).time().'.'.$request->icon->extension(); 
            $request->icon->move(public_path('serviceIcon'), $iconPath);
        }
    
        $service = new Service();
        $service->name = $request->name;
        $service->category_id = $request->category;
        $service->description = $request->description;
        $service->price = $request->price;
        $service->status = $request->status;
        $service->icon = $iconPath;
        $service->save();

        return redirect()->route('service.index')->with('success', 'Service created successfully.');
    }
    public function edit(Service $service)
    {
        $this->authorize('update service');
        $categories = ServiceCategory::all();
        return view('services.form', compact('service','categories'));
    }
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric|min:0',
            'status' => 'required|in:active,inactive',
        ]);

        $service->name = $request->name;
        $service->category_id = $request->category;
        $service->description = $request->description;
        $service->price = $request->price;
        $service->status = $request->status;
        if ($request->hasFile('icon')) {
            $iconPath = "serviceIcon/".rand(99999,9999999).time().'.'.$request->icon->extension(); 
            $request->icon->move(public_path('serviceIcon'), $iconPath);
            $service->icon = $iconPath;
        }
        $service->save();

        return redirect()->route('service.index')->with('success', 'Service updated successfully.');
    }
    
}
