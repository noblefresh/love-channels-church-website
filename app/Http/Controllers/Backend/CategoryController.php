<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $categories = Category::latest()->paginate(20);
            return view('admin.categories.index', compact('categories'));
        } catch (\Exception $e) {
            dd('An exceptional error occured');
        } catch (\Exception $e) {
            dd('An error occured');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create', ['title' => 'Create Category']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => ['required', 'string', 'max:255']
        ]);
        try {
            if (Category::create($data)) {
                return back()->withSuccess('New category created successfully.');
            }else{
                return back()->withError('An error occured while creating category');
            }
        } catch (\Exception $e) {
            return back()->withError('An exceptional error occured');
        } catch (\Error $e) {
            return back()->withError('An error occured');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        try {
            return view('admin.categories.edit', compact('category'));
        } catch (\Exception $e) {
            dd('An exceptional error occured');
        } catch (\Exception $e) {
            dd('An error occured');
        } 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $data = $this->validate($request, [
            'name' => ['required', 'string', 'max:255']
        ]);
        try {
            if ($category->update($data)) {
                return back()->withSuccess('Category updated successfully.');
            }else{
                return back()->withError('An error occured while updating category');
            }
        } catch (\Exception $e) {
            return back()->withError('An exceptional error occured');
        } catch (\Error $e) {
            return back()->withError('An error occured');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try {
            if ($category->delete()) {
                return back()->withSuccess('Category deleted successfully');
            } else {
                return back()->withError('An error occured while deleting category');
            }
            
        } catch (\Exception $e) {
            return back()->withError('An exceptional error occured');
        } catch (\Error $e) {
            return back()->withError('An error occured');
        }
    }
}
