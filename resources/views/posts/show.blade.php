@extends('templates.app')

@section('content')
     <div class="container">
         <div class="row jumbotron">
            <div class="col-md-4 offset-md-4">
                   <strong> <?php echo $post->title; ?>  </strong>
                   <p> <?php echo $post->body; ?> </p>
                   <small> Created at: <?php echo $post->created_at; ?> </small>
            </div>
         </div>
     </div>
@endsection