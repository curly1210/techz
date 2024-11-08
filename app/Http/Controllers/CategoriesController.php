<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;


class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(5);
        // dd($categories);
        return view('admin.categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategory $request)
    {

        $request->validated();
        Category::create($request->all());
        return redirect('admin/categories')->with('status', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {

        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:30'
        ]);
        $category->update($request->all());
        return redirect('admin/categories')->with('status', "Cập nhật thành công");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('admin/categories')->with('status', "Xóa thành công");
    }
    public function search(Request $request)
    {
        $search = $request->name;
        $query = Category::query();
        $categories = $query->where('name', 'like', "%$search%")->paginate(6);
        // dd($categories);

        return view("admin.categories.index", compact('search', 'categories'));
    }
}
