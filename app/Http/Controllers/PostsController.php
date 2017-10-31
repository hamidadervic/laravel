<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post; //Bring Post model so we can use it

//use DB; -> For SQL syntax

class PostsController extends Controller
{

    /*
    Prevent guest users (with construct function) to create or/and posts, 
    This functions are available just for registered users
    */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //$posts =  Post::all(); -> version 1
        //$post = DB::select('SELECT * FROM posts'); -> SQL syntaxt 

        //$posts = Post::orderBy('title','desc')->get();

        $posts = Post::orderBy('created_at','desc')->paginate(10);
        return view('posts.index')->with('posts', $posts);
    }

    public function create()
    {
       return view('posts.create');
    }


    public function store(Request $request)
    {
        //Validation of form data
        $this->validate($request, [
                 'title' => 'required',
                 'body' => ' required'
            ]);

        //Create new post based on inputs
        $post = new Post; //We can use it 'cause we have it on the top
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect('/posts')->with('success','New post created!');
        /*
        success -> Message that will be show after redirect
        We have a condition in inc/messages.blade.php that is included in inc/app.blade.php
        */
    }


    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post',$post);
    }


    public function edit($id)
    {
        $post = Post::find($id) ;
        return view('posts.edit')->with('post',$post);
    }


    public function update(Request $request, $id)
    {
        //Validation of form data
        $this->validate($request, [
                 'title' => 'required',
                 'body' => ' required'
            ]);

        //$post = new Post; We can't use this, because we are not going to createa now post, insted :
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        return redirect('/posts')->with('success','Post updated!');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/posts')->with('success','Post deleted!');
    }
}
