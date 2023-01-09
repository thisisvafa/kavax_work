<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\BlogCategory;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BlogCategory $category)
    {
        try {
            $categories = $category->allData();
            return view('admin.blog-category.index', compact('categories'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog-category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogCategory $category, Request $request)
    {
        $request->validate([
            'name' => 'required|unique:blog_categories',
        ]);

        try {
            $category->create((array) $request->all());
            return redirect()->route('blog-categories.index')->with(
                'notification',
                [
                    'class' => 'success',
                    'message' => 'Category Created Successfully.'
                ]
            );
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, BlogCategory $category)
    {
        try {
            $category = $category->view($id);
            return view('admin.blog-category.edit', compact('category'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, BlogCategory $category)
    {
        $request->validate([
            'name' => 'required|unique:blog_categories,name,' . $id,
        ]);

        try {
            $category->edit($id, (array)$request->all());
            return redirect()->route('blog-categories.index')->with(
                'notification',
                [
                    'class' => 'success',
                    'message' => 'Category Updated Successfully.'
                ]
            );
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogCategory $category, Request $request)
    {
        try {
            foreach ($request->delete_item as $key => $val) {
                $category->find($val)->delete();
            }
            return redirect()->route('blog-categories.index')->with(
                'notification',
                [
                    'class' => 'success',
                    'message' => 'Category Deleted.'
                ]
            );
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
