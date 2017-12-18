@extends('admin.layouts.master')

@section('content')

<div class="card">
	<div class="card-header">
		Trashed Post
	</div>
	<div class="card-body p-0">
		<table class="table">
			<thead>
				<tr>
					<th>Image</th>
					<th class="w-50">Title</th>
					<th>Restore</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				@if($posts->count() > 0)
					@foreach($posts as $post)
						<tr>
							<td>
								<img src="{{ asset($post->featured) }}" alt="{{ $post->title }}" width="30" height="30">
							</td>
							<td>
								<a href="{{ route('posts.show', ['id' => $post->id]) }}">{{ $post->title }}</a>
							</td>
							<td>
								<a class="btn btn-success btn-sm" href="{{ route('posts.restore', ['id' => $post->id]) }}" role="button">Restore</a>
							</td>
							<td>
								<a class="btn btn-danger btn-sm" href="{{ route('posts.kill', ['id' => $post->id]) }}" role="button">Delete</a>
							</td>
						</tr>
					@endforeach
				@else
					<tr>
						<td colspan="4" class="text-center">There is no post in trash</td>
					</tr>
				@endif
			</tbody>
		</table>
	</div>
</div>

@stop