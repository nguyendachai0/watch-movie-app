<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $listCategories = Category::all();
        return view('admin.category.index', compact('listCategories'));
    }
    public function create()
    {
        $list = Category::all();
        return view('admin.category.index', compact('list'));
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $category = new Category();
        $category->title = $data['title'];
        $category->description = $data['description'];
        $category->slug = $data['slug'];
        $category->status = $data['status'];
        $category->save();
        return redirect()->back();
    }
    public function show(string $id)
    {
        //
    }
    public function edit(string $id)
    {
        $categoryToEdit = Category::find($id);
        $listCategories = Category::all();
        return view('admin.category.index', compact('listCategories', 'categoryToEdit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $category = Category::find($id);
        $category->title = $data['title'];
        $category->description = $data['description'];
        $category->slug = $data['slug'];
        $category->status = $data['status'];
        $category->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::find($id)->delete();
        return redirect()->back();
    }
    public function resorting(Request $request)
    {
        $data = $request->all();
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
        die();
        foreach ($data['array_id'] as $key => $value) {
            $category = Category::find($value);
            $category->position = $key;
            $category->save();
        }
        return response()->json(['success' => true]);
    }
}
