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
        $this->middleware('auth',['except' => ['index','show']]);
        /*
        index and show are the routes that are visible to guest users
        ['except' => ['index','show']]
        */

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
                 'body' => ' required',
                 'coverimage' => 'image|max:1999',
            ]);

        if( $request->hasFile('coverimage') ) {
           
            $fileNameWithExtension = $request->file('coverimage')->getClientOriginalName();

            // There could be a problem if user upload an image with a name that already exists

            // Get just file name
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);

            //Get just EXTENSION
            $extension = $request->file('coverimage')->getClientOriginalExtension();

            // And now the full name of image, we will use the time() function so name of every image will be unique

            $fileNameToStore = $fileName . '_' . time() . '.' . $extension; 

            // On the end, the variable for saving the image with laravel
            $path = $request->file('coverimage')->storeAs('public/coverimages',$fileNameToStore); //Hm I can't use storeAs because of version - 5.2.45
        } else {
            $fileNameToStore = 'noimage';
        }

        //Create new post based on inputs
        $post = new Post; //We can use it 'cause we have it on the top
        $post->user_id = auth()->user()->id;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->coverimage = $fileNameToStore;
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
        $post = Post::find($id);

        // User can edit just posts that he is wrote
        if (auth()->user()->id !== $post->user_id ) {
            return redirect('/posts')->with('error','Unauthorized page!');
        }

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

        // Redirect for deleteing post if user is not logged
        // User can delete just posts that he is wrote
        if (auth()->user()->id !== $post->user_id ) {
            return redirect('/posts')->with('error','Unauthorized page!');
        }

        $post->delete();
        return redirect('/posts')->with('success','Post deleted!');
    }
}
