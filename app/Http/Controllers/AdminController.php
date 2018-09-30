<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Menu;
use DB;
use App\Food;
class AdminController extends Controller
{

   

 public function index()
    {

        $qcodes = Category::all();

        $qcodes->each(function(Category $qrcode) {
            Food::where('id', $qrcode->id)->update([
                'name' => $qrcode->name,
                'cate_id' => $qrcode->cate_id
                 return  $qrcode->name;

            ]);

         });

        


        $menus=Menu::all(); 
        
        // $food = DB::select("SELECT c.cate_name, f.* FROM category AS c INNER JOIN food AS f WHERE c.cate_id");
        $category = Category::all();

        $food = DB::select("SELECT * FROM food ORDER BY name ASC");
         // return $cate_name;

       // return view('backend.food.index',['food'=>$food])->with('menus',$menus)->with('category', $category); 
    }

    public function create()
    {
        $cates=Category::get();
        if (count($cates)==0) {
            $er="you need to add category first";
            return view('category.create',['cates'=>$cates,'error'=>$er]);
        }
        else return view('backend.food.create',['cates'=>$cates]);
        
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
            'name' => 'required',
            'price' => 'required',
            'picture' => 'required'
        ]);
        if (!empty($request->picture)) {
           /*actualname*/
        }
        $food = new Food();

        $food->name=$request->name;
        $food->price=$request->price;
        $food->cate_id=$request->cate_id;
        $food->description=$request->description;
        $image=$request->file('picture');/*temporary location = $request->picture*/
        if (!empty($image)) {
                   $filename = time() .'.'.$request->picture->getClientOriginalName();
                   $image->move('uploads/picture',$filename);
                   $food->picture=$filename;
                }
       if($food->save()){
        return redirect()->route('admin.index');
       }

        return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource. 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $food=food::findOrFail($id);
        return view('backend.food.show',['foods'=>$food]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $food=food::findOrFail($id);
        $cates=Category::get();
        return view('backend.food.edit',['foods'=>$food])->with('cates',$cates);
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
        
        $this->validate($request,[
            'name'=>'required',
            'price'=>'required'
        ]);
      
        $food=food::findOrFail($id);

        $food->name=$request->name;
        $food->price=$request->price;
        $food->cate_id=$request->cate_id;
        $food->description=$request->description;
        $image=$request->file('picture');/*temporary location = $request->picture*/
        if (!empty($image)) {
                   $filename = time() .'.'.$request->picture->getClientOriginalName();
                   $image->move('uploads/picture',$filename);
                   $food->picture=$filename;
                }
        if($food->save()){
        return redirect()->route('admin.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
       food::findorFail($id)->delete();
        return redirect()->route('admin.index');
    }
}
