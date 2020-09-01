<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category= Category::orderBy('created_at','desc')->get();
        $name='';
        return view('category.index')->with(array(
            'category' =>$category,
            'name' =>$name

        ));//use with can add thing;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());// to see the request 
      
        $this->validate($request,[

            'name'    => 'required',
        ]);

        $Category = new Category;

        $Category->name = $request->input('name');
        $Category->save();//save this is afunction
        return  redirect('/user/category')->with('success','Done Success');
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
        $category= Category::find($id);

        $name='';
            return view('category.edit')->with(array(
                'category' =>$category,
                'name' =>$name
    
            ));//use with can add thing;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $this->validate($request,[

            'name'    => 'required',
           
        ]);
        $category= Category::find($id);
        $category->name =$request->input('name');
        $category->save();
         return redirect()->back();
      //  return  redirect('/user/category')->with('success','Done Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category= Category::find($id);
        $category->delete();
        return redirect()->back();
    }
}
