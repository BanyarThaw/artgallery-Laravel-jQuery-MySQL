<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\CategoryService;
use App\Traits\SpecificDetailTrait;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use SpecificDetailTrait; // Trait

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::orderBy('created_at','DESC')->paginate(10);

        return view('categories.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,CategoryService $categoryService)
    {
        $categoryService->createOrUpdateCategory($request);

        return redirect()->route('categories.index')->with("info","New Category created!!!");
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
        $data = Category::find($id);

        return view('categories.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, CategoryService $categoryService)
    {
        $categoryService->createOrUpdateCategory($request,$id);

        return redirect()->route('categories.index')->with("info","Category updated!!!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->deleteContentPhoto('category_id',$id);
        
        $category = Category::find($id);
        $category->delete();
        
        return redirect()->route('categories.index')->with("info","Category deleted!!!");
    }
}
