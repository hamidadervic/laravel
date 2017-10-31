@extends('layouts.app')

@section('content')
    <div class="container">
         <div class="row">
            <div class="jumbotron col-md-8 offset-md-2">
                <h4 class="text-center"> Create post </h4>
                <?php echo Form::open(['action' => 'PostsController@store', 'method' => 'POST']); ?>
                  <div class="form-group">
                      <?php echo Form::label('title','Title'); ?>
                      <?php echo Form::text('title','',['class' => 'form-control','placeholder' => 'Add your title']); ?>
                  </div>
                  <div class="form-group">
                      <?php echo Form::label('body','Body'); ?>
                      <?php echo Form::textarea('body','',['id' => 'article-ckeditor','class' => 'form-control','placeholder' => 'Add your body text', 'coll' => 3]); ?>
                  </div>
                  <?php echo Form::submit('Submit',['class' => 'btn btn-default']); ?>
                <?php echo Form::close(); ?>
             </div>
         </div>
    </div>
@endsection