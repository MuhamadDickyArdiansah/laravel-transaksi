<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminCategoryRequest;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();

        return view('pages.admin.categories.index', [
            'categories' => $categories
        ]);
    }

    public function create()
    {
        return view('pages.admin.categories.create');
    }

    public function store(AdminCategoryRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        if ($request->file('image')) {
            $image_file = $request->file('image');
            $image_name = time() . "_" . $image_file->getClientOriginalName();
            $image_file->move(public_path('assets/images/categories'), $image_name);
            $data['image'] = $image_name;
        }

        Category::create($data);
        notify()->success('Category berhasil dibuat!');
        return redirect()->route('admin.categories.index')->with('success', 'Category berhasil dihapus!');
    }

    public function show(Category $category)
    {
        return view('pages.admin.categories.show', [
            'category' => $category
        ]);
    }

    public function edit(Category $category)
    {
        return view('pages.admin.categories.edit', [
            'category' => $category
        ]);
    }

    public function update(AdminCategoryRequest $request, Category $category)
    {
        $data = $request->all();

        if ($request->name !== $category->name) {
            $data['slug'] = Str::slug($request->name);
        }

        if ($request->file('image')) {
            if ($category->image !== null) {
                unlink(public_path('assets/images/categories/' . $category->image));
            }

            $image_file = $request->file('image');
            $image_name = time() . "_" . $image_file->getClientOriginalName();
            $image_file->move(public_path('assets/images/categories'), $image_name);
            $data['image'] = $image_name;
        }

        $category->update($data);
        notify()->success('Category berhasil diubah!');
        return redirect()->route('admin.categories.index')->with('success', 'Category berhasil diubah!');
    }

    public function destroy(Category $category)
    {
        if ($category->image !== null) {
            unlink(public_path('assets/images/categories/' . $category->image));
        }

        $category->delete();
        notify()->success('Category berhasil dihapus!');
        return redirect()->route('admin.categories.index')->with('success', 'Category berhasil dihapus!');
    }
}
