@extends('admin.layouts.master')

@section('content')

<div class="card">
	<div class="card-header">
		Create a new Post
	</div>
	<div class="card-body">
		
		@include('admin.shared.errors')

		<form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
			{{ csrf_field() }}
			<fieldset class="form-group">
				<label for="title">Title</label>
				<input type="text" name="title" class="form-control" id="title">
			</fieldset>
			<fieldset class="form-group">
				<label for="category">Category</label>
				<select class="form-control" name="category_id" id="eexampleSelect11">
					@foreach($categories as $category)
						<option value="{{ $category->id }}">{{ $category->name }}</option>
					@endforeach
				</select>
			</fieldset>
			<fieldset class="form-group">
				<label for="body">Body</label>
				<textarea class="form-control" name="body" id="body" rows="8"></textarea>
			</fieldset>
			<fieldset class="form-group">
				<label for="featured">File input</label>
				<input type="file" name="featured" class="form-control" id="featured">
			</fieldset>
			
			<fieldset class="form-group">
				<label>Select Tags</label>
				@foreach($tags as $tag)
					<div class="form-check">
						<label class="form-check-label">
							<input type="checkbox" name="tags[]" class="form-check-input" value="{{ $tag->id }}"> {{ $tag->name }}
						</label>
					</div>
				@endforeach
			</fieldset>
			
			<fieldset class="form-group">
				<button type="submit" class="btn btn-primary">Submit</button>
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