@extends('templates.app')

@section('content')
<div class="container">
@include('inc.messages')
	<h2 class="text-center"> All posts </h2> <hr>
	<div class="content">
		<?php if ( count ( $posts ) > 0 ) { //If there are posts ?>
		<table class="table table-dark">
			<thead>
				<tr>
					<th scope="col">Title</th>
					<th scope="col">Body</th>
					<th scope="col">Created at</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ( $posts as $post ) { ?>
                 <tr>
                    <td> <a href="/blog/public/posts/<?php echo $post->id; ?>"> <?php echo $post->title; ?> </a> </td>
                    <td> <?php echo $post->body; ?> </td>
                    <td> <?php echo $post->created_at; ?> </td>
                 </tr>
			<?php  }  ?>
			</tbody>
		</table>
		<?php } ?>

		    <?php echo $posts->links();  ?>

	</div>
</div>
@endsection
