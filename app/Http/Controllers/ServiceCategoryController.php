<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class ServiceCategoryController extends Controller
{
    public function index()
    {
        $this->authorize('view service category');
        return view('service-categories.index');
    }

    public function getCategories(Request $request)
    {
        $categories = ServiceCategory::all();
        return DataTables::of($categories)
            ->addColumn('can_edit', function () {
                return Auth::user()->can('update category');
            })
            ->make(true);
    }

    public function create()
    {
        $this->authorize('create service category');
        return view('service-categories.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:service_categories,name'
        ]);

        $category = new ServiceCategory();
        $category->name = $request->name;
        $category->save();

        return redirect()->route('category.index')->with('success', 'Category created successfully.');
    }

    public function edit(ServiceCategory $category)
    {
        $this->authorize('edit service category');
        return view('service-categories.form', compact('category'));
    }

    public function update(Request $request, ServiceCategory $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:service_categories,name,' . $category->id
        ]);

        $category->name = $request->name;
        $category->save();

        return redirect()->route('category.index')->with('success', 'Category updated successfully.');
    }

}
