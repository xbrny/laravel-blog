@extends('admin.layouts.master')

@section('content')

<div class="card">
	<div class="card-header">
		Update post
	</div>
	<div class="card-body">
		
		@include('admin.shared.errors')

		<form method="post" action="{{ route('posts.update', ['id' => $post->id]) }}" enctype="multipart/form-data">
			{{ csrf_field() }}
			<fieldset class="form-group">
				<label for="title">Title</label>
				<input type="text" name="title" class="form-control" id="title" value="{{ $post->title }}">
			</fieldset>
			<fieldset class="form-group">
				<label for="category">Category</label>
				<select class="form-control" name="category_id" id="eexampleSelect11">
					@foreach($categories as $category)
						<option value="{{ $category->id }}"
							@if($category->id == $post->category_id)
								selected
							@endif
						>{{ $category->name }}</option>
					@endforeach
				</select>
			</fieldset>
			<fieldset class="form-group">
				<label for="body">Body</label>
				<textarea class="form-control" name="body" id="body" rows="8">{{ $post->body }}</textarea>
			</fieldset>
			<fieldset class="form-group">
				<label for="featured">File input</label>
				<input type="file" name="featured" class="form-control-file" id="featured" value="{{ asset($post->featured) }}">
			</fieldset>
			
			<fieldset class="form-group">
				<label>Select Tags</label>
				@foreach($tags as $tag)
					<div class="form-check">
						<label class="form-check-label">
							<input type="checkbox" name="tags[]" class="form-check-input" value="{{ $tag->id }}"
							@foreach($post->tags as $post_tag)
								@if($tag->id == $post_tag->id)
									checked 
								@endif
							@endforeach
							> {{ $tag->name }}
						</label>
					</div>
				@endforeach
			</fieldset>
			
			<fieldset class="form-group">
				<button type="submit" class="btn btn-primary">Update</button>
			</fieldset>
		</form>
	</div>
</div>

@stop

@section('links')
	<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote-bs4.css" rel="stylesheet">
@stop

@section('scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote-bs4.js"></script>
	<script>
		$(document).ready(function() {
			$('#body').summernote({
				minHeight: 300
			});
		});
	</script>
@stop