@extends('layouts.app')

@section('content')
    <div class="container">
         <div class="row">
            <div class="jumbotron col-md-6 offset-md-3">
                <h4 class="text-center"> Create post </h4>
                <?php echo Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST']); ?>
                  <div class="form-group">
                      <?php echo Form::label('title','Title'); ?>
                      <?php echo Form::text('title', $post->title,['class' => 'form-control','placeholder' => 'Add your title']); ?>
                  </div>
                  <div class="form-group">
                      <?php echo Form::label('body','Body'); ?>
                      <?php echo Form::textarea('body',$post->body,['id' => 'article-ckeditor','class' => 'form-control','placeholder' => 'Add your body text', 'coll' => 3]); ?>
                  </div>
                  <!-- Hidden put request because we can't make POST request to this route-->
                  <input name="_method" type="hidden" value="PUT">
                  <?php echo Form::submit('Submit',['class' => 'btn btn-default']); ?>
                <?php echo Form::close(); ?>
             </div>
         </div>
    </div>
@endsection