<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;

class PostsController extends Controller
{

        public function __construct()
    {
        $this->middleware('auth',['except' =>['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Fetching data by Using SQL query
            //$posts=DB::select("select *from posts");
        //Fetching data by Using Eloquent Query
            // $posts = Post::all();
            // $posts = Post::orderBy('title','desc')->get();
            // $posts = Post::where('id','1')->get();
            // $posts = Post::orderBy('title','desc')->take('1')->get();
        $posts = Post::orderBy('id','desc')->get();
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //check validation
        $this->validate($request,[
            'title' =>'required',
            'body' =>'required',
            ]);
        //create posts
        $post=new Post();
        $post->title= $request->input('title');
        $post->body= $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect('/posts')->with('success','Post Created');

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
        $post=Post::find($id);
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post=Post::find($id);
        //check for right user
        if(auth()->user()->id !=$post->user->id){
            return redirect('/posts')->with('error','Unauthorized Access');
        }
        return view('posts.edit')->with('post',$post);
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
        //
                //check validation
        $this->validate($request,[
            'title' =>'required',
            'body' =>'required',
            ]);
        //create posts
        $post=Post::find($id);
        $post->title= $request->input('title');
        $post->body=$request->input('body');
        $post->save();

        return redirect('/posts')->with('success','Post Updated');

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
        $post=Post::find($id);

        $post->delete();
        return redirect('/posts')->with('success','Post Removed');
    }
}
