<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Menu;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
     $menus=Menu::all(); 
       $cate=Category::get();
       return view('backend.category.index',['cates'=>$cate])->with('menus',$menus); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'cate_name'=>'required',
            'cate_description'=>'required'
        ]);
        $input=$request->all();
        Category::create($input);
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return "hello";
        $cate=Category::findOrFail($id);
        return view('backend.category.show',['cates'=>$cate]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cate=Category::findOrFail($id);
        return view('backend.category.edit',['cates'=>$cate]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function up(Request $request, $id)
    {
        $cate=Category::findOrFail($id);
        $this->validate($request,[
            'cate_name'=>'required',
            'cate_description'=>'required'
        ]);
        $cate->update([
            'cate_name' => $request['cate_name'],
            'cate_description' => $request['cate_description'],
            'staus' => $request['staus']
        ]); 
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function delete($id)
    {
        Category::findorFail($id)->delete();
        return redirect()->route('category.index');
    }
}
