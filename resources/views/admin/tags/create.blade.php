@extends('admin.layouts.master')

@section('content')

<div class="card">
	<div class="card-header">
		Create a Tag
	</div>
	<div class="card-body">
		<form method="post" action="{{ route('tags.store') }}">
			{{ csrf_field() }}
			<fieldset class="form-group">
				<label for="name">Tag Name</label>
				<input type="text" name="name" class="form-control" id="name">
			</fieldset>
			<fieldset class="form-group">
				<button class="btn btn-primary" type="submit">Create</button>
			</fieldset>
		</form>
	</div>
</div>

@stop