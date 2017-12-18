@extends('admin.layouts.master')

@section('content')

<div class="card">
	<div class="card-header">
		All Post
	</div>
	<div class="card-body p-0">
		<table class="table">
			<thead>
				<tr>
					<th>Image</th>
					<th class="w-50">Title</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				@if($posts->count() > 0)
					@foreach($posts as $post)
						<tr>
							<td>
								<img src="{{ $post->featured }}" alt="{{ $post->title }}" width="30" height="30">
							</td>
							<td>
								<a href="{{ route('posts.show', ['id' => $post->id]) }}">{{ $post->title }}</a>
							</td>
							<td>
								<a class="btn btn-info btn-sm" href="{{ route('posts.edit', ['id' => $post->id]) }}" role="button">Edit</a>
							</td>
							<td>
								<a class="btn btn-danger btn-sm" href="{{ route('posts.destroy', ['id' => $post->id]) }}" role="button">Delete</a>
							</td>
						</tr>
					@endforeach
				@else
					<tr>
						<td colspan="4" class="text-center">There is no post</td>
					</tr>
				@endif
			</tbody>
		</table>
	</div>
</div>

@stop