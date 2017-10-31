@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <a class="btn btn-primary" href="{{ url('posts/create') }}"> Create post </a>
                    <p> Welcome {{ Auth::user()->name }}! </p>
                    <h3> These are your posts: </h3>
                    <table class="table table-striped">
                        <tr>
                            <td> Title </td>
                            <td> Body </td>
                            <td> </td>
                            <td></td>
                        </tr>
                        <?php foreach($posts as $post ) { ?>
                        <tr> 
                          <th> <?php echo $post->title; ?> </th>
                          <th> <?php echo $post->body; ?> </th>
                          <th> <a href="{{url('/')}}/posts/<?php echo $post->id; ?>/edit"> Edit </a> </th>
                          <th> 
                          <!-- Delete this post with form -->
                             <?php echo Form::open(['action' => ['PostsController@destroy',$post->id],'method' => 'POST', 'class' => 'pull-right' ]); ?>
                             <!-- Hidden delete request because we can't make POST request to this route-->
                             <input name="_method" type="hidden" value="DELETE">
                             <?php echo Form::submit('Delete',['class' => 'btn btn-danger']); ?>
                             <?php echo Form::close(); ?> 
                        </th>
                         </tr>
                         <?php    } ?>
                     </table>
                 </div>
             </div>
         </div>
     </div>
 </div>
 @endsection
