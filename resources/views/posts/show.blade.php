@extends('layouts.app')

@section('content')
<div class="container">
 <div class="row jumbotron">
  <div class="col-md-4 offset-md-4">
   <h3> <?php echo $post->title; ?>  </h3>
   <p> <?php echo $post->body; ?> </p>
   <small> Created at: <?php echo $post->created_at; ?> </small>
   <hr>
   
   <!-- If user IS NOT a guest, show below: -->
   <?php if(!Auth::guest()) { ?>
    <!-- Another condition, user_id -->
    <?php if (Auth::user()->id == $post->user_id ) { ?>
      <a href="/blog/public/posts/<?php echo $post->id; ?>/edit" class="btn btn-primary"> Edit </a>

      <!-- Delete this post with form -->
      <?php echo Form::open(['action' => ['PostsController@destroy',$post->id],'method' => 'POST', 'class' => 'pull-right' ]); ?>
      <!-- Hidden delete request because we can't make POST request to this route-->
      <input name="_method" type="hidden" value="DELETE">
      <?php echo Form::submit('Delete',['class' => 'btn btn-danger']); ?>
      <?php echo Form::close(); ?>
      <?php } ?>
      <?php  } ?>
    </div>
  </div>
</div>
@endsection