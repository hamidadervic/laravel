<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post; //Bring Post model so we can use it

class PostsController extends Controller
{

    public function index()
    {
        $posts =  Post::all(); //Make it availale for view posts.index
        return view('posts.index')->with('posts', $posts);
    }

    public function create()
    {
       return '<h1> POST CREATE </h1>';
    }


    public function store(Request $request)
    {
        //
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
