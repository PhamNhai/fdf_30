<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\TypeCategory;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(config('view.category_per_page'));

        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeId = TypeCategory::pluck('name', 'id');

        return view('admin.category.add', compact('typeId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $input = $request->only('name', 'type_id');
        $category = Category::CreateCategory($input);
        if ($category && $category != null) {

            return redirect()->route('category.index')
                ->with('success', trans('category.create-category-successfully'));
        } else {
            return redirect()->route('category.index')
                ->with('errors', trans('category.create-category-fail'));
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
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $typeId = TypeCategory::pluck('name', 'id');

        return view('admin.category.edit', compact('category', 'typeId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        try {
            $input = $request->only('name', 'type_id');
            Category::findOrFail($id)->update($input);

            return redirect()->route('category.index')
                ->with('success', trans('category.update-category-successfully'));
        } catch (Exception $e) {
            return redirect()->route('category.index')
                ->with('errors', trans('category.update-category-fail'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Category::findOrFail($id)->delete();

            return redirect()->route('category.index')
                ->with('success', trans('category.delete-category-successfully'));
        } catch (Exception $e) {
            return redirect()->route('category.index')
                ->with('errors', trans('category.delete-category-fail'));
        }
    }
}
