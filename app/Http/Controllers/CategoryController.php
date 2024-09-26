<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Category;
use App\Http\Requests\CategoryStoreRequest;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'asc')->get();
        return view('categories.list', ['categories' => $categories]);
    }

    public function getcategories()
    {
        $categories = Category::select('name')->orderBy('name', 'asc')->get();
        return response()->json($categories);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(CategoryStorerequest $request)
    {
        //DB Insertion
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        //After saving redirect to display of all categories
        return redirect()->route('categories.list')->with('success', 'Category created successfully');
    }

    public function edit($id)
    {
        //find the category from db
        $category = Category::findorfail($id);

        //return the view with the found category
        return view('categories.edit', ['category' => $category]);
    }

    public function update($id, CategoryStorerequest $request)
    {
        //find category from db
        $category = Category::findOrFail($id);

        //update category
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        //After updating redirect to display of all categories
        return redirect()->route('categories.list')->with('success', 'Category updated successfully.');
    }


    public function destroy($id)
    {
        //find the exam from db
        $category = Category::findorfail($id);

        //remove the exam from db
        $category->delete();

        //redirect to list after successful deletion
        return redirect()->route('categories.list')->with('success', 'Category deleted successfully');
    }
}
