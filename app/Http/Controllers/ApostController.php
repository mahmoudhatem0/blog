<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Apost;
use App\Tag;
use DB;
use App\User;
use Illuminate\Support\Facades\storage;//to get the storage

class ApostController extends Controller
{


      //  public function __construct(){
            
     //       $this->middleware('auth');
            
      //  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts= Apost::orderBy('created_at','desc')->get();
        return view('aposts.index')->with(array(
            'posts' =>$posts,

        ));//use with can add thing;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $categorys=Category::all();
        if (count($categorys)==0) {
         return  redirect()->route('category.create')->with('error','you not have any categarys');//redirect to rutern the page post
        } else {
            return view('aposts.create')->with(array(
                'category' => $categorys,
                'tags' =>Tag::all()
    
            ));//use with can add thing;
        }
        

       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->all());// to see the request 
      
        $this->validate($request,[

            'title'       => 'required',
            'content'     =>'required',
            'category_id' =>'required',
            'tags' =>'required',
            'featrued'    =>'image|nullable|max:1024',
        ]);
        if ($request->hasFile('featrued')) {
            $filenameWithExtention =$request->file('featrued')->getClientOriginalName();
            $fileName=pathinfo($filenameWithExtention,PATHINFO_FILENAME);
            $extension=$request->file('featrued')->getClientOriginalExtension();
            $fileNameStore= $fileName . '_' . time() . '.' . $extension;
            $path =$request->file('featrued')->storeAs('public/apost_image',$fileNameStore);
        } else {
            $fileNameStore='no_Image.png';
        }
        $posts= new Apost;
        $posts->title =$request->input('title');
        $posts->content=$request->input('content');
        $posts->category_id=$request->input('category_id');
        $posts->featrued= $fileNameStore;
        $posts->slug=$request->input('title');
        $posts->user_id=auth()->user()->id;
        $posts->save();//save this is afunction
        $posts->tags()->attach($request->input('tags'));
        return redirect('user/aposts');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     $posts= Apost::find($id); // to find the post = sellect  where id = ?
      $name='';
            return view('aposts.show')->with(array(
                'posts' =>$posts,
                'name' =>$name
    
            ));//use with can add thing;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts= Apost::Find($id);

        return view('aposts.edit')->with(array(
            'category' =>Category::all(),
            'posts' =>$posts,
            'tags' =>Tag::all()

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

            'title'       => 'required',
            'content'     =>'required',
            'category_id' =>'required',
            'featrued'    =>'image|nullable|max:1024',
        ]);
        if ($request->hasFile('featrued')) {
            $filenameWithExtention =$request->file('featrued')->getClientOriginalName();
            $fileName=pathinfo($filenameWithExtention,PATHINFO_FILENAME);
            $extension=$request->file('featrued')->getClientOriginalExtension();
            $fileNameStore= $fileName . '_' . time() . '.' . $extension;
            $path =$request->file('featrued')->storeAs('public/apost_image',$fileNameStore);
        }

        $posts= Apost::Find($id);
        $posts->title =$request->input('title');
        $posts->content=$request->input('content');
        $posts->category_id=$request->input('category_id');
        if ($request->hasFile('featrued')) {
        
            $posts->featrued= $fileNameStore;

        } 
        $posts->save();//save this is afunction
        $posts->tags()->sync($request->input('tags'));
        return redirect()->route('aposts.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts=  Apost::Find($id);
        if ($posts->featrued !='no_Image.png') {
            storage::delete('public/apost_image/' .$posts->featrued);
        }
        $posts->delete();
        return  redirect('/user/aposts')->with('success','Done Success');//redirect to rutern the page post
    }
    public function trashed()
    {
        $posts=  Apost::onlyTrashed()->get();

        return view('aposts.softdeleted')->with('posts',$posts);
    }
    public function hdelete($id)
    {
        $posts=  Apost::onlyTrashed()->where('id',$id)->first();;
        $posts->forceDelete();
        return redirect()->back();
    }
    public function restore($id)
    {
        $posts=  Apost::onlyTrashed()->where('id',$id)->first();
        $posts->restore();
        return redirect()->back();
    }
    

}
