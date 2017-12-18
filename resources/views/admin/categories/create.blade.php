@extends('admin.layouts.master')

@section('content')

<div class="card">
	<div class="card-header">
		Create a Category
	</div>
	<div class="card-body">
		<form method="post" action="{{ route('categories.store') }}">
			{{ csrf_field() }}
			<fieldset class="form-group">
				<label for="name">Category Name</label>
				<input type="text" name="name" class="form-control" id="name">
			</fieldset>
			<fieldset class="form-group">
				<button class="btn btn-primary">Create</button>
			</fieldset>
		</form>
	</div>
</div>

@stop