<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryAddRequest;
use App\Http\Requests\CategoryUpdateRerquest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
       if(Gate::any(['admin','category'],Auth::user())){
        $cats = Category::search(10); 
        return view('admin.category.index', compact('cats'));
       }else{
            return abort(403);
       }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add(CategoryAddRequest $req)
    {
        $form_data = $req->all('name','status');
        try {
            Category::create($form_data);
            return redirect()->route('category.index')->with('yes', 'Thêm mới thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('no', 'Thêm mới không thành công');
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
    public function edit(Category $cat)
    {
        return view('admin.category.edit', compact('cat'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRerquest $req, Category $cat)
    {
        $form_data = $req->all('name','status');     
        try {
            $cat->update($form_data);
            return redirect()->route('category.index')->with('yes', 'Cập nhật thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('no', 'Cập nhậtkhông thành công');
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function delete(Category $cat){
        $cat->delete();
        return redirect()->route('category.index');
    }
}