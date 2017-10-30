<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post; //Bring Post model so we can use it

//use DB; -> For SQL syntax

class PostsController extends Controller
{

    public function index()
    {
        //$posts =  Post::all(); -> version 1
        //$post = DB::select('SELECT * FROM posts'); -> SQL syntaxt 

        //$posts = Post::orderBy('title','desc')->get();

        $posts = Post::orderBy('title','desc')->paginate(10);
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
        //
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
}
