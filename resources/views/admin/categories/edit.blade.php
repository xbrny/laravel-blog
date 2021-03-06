@extends('admin.layouts.master')

@section('content')

<div class="card">
	<div class="card-header">
		Update a Category
	</div>
	<div class="card-body">
		<form method="post" action="{{ route('categories.update', ['id' => $category->id]) }}">
			{{ csrf_field() }}
			<fieldset class="form-group">
				<label for="name">Category Name</label>
				<input type="text" name="name" class="form-control" id="name" value="{{ $category->name }}">
			</fieldset>
			<fieldset class="form-group">
				<button class="btn btn-primary" type="submit">Update</button>
			</fieldset>
		</form>
	</div>
</div>

@stop