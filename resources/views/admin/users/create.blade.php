@extends('admin.layouts.master')

@section('content')

<div class="card">
	<div class="card-header">
		Create new User
	</div>
	<div class="card-body">
		<form method="post" action="{{ route('users.store') }}">
			{{ csrf_field() }}

			<fieldset class="form-group">
				<label for="name">Name</label>
				<input type="text" name="name" class="form-control" id="name">
			</fieldset>

			<fieldset class="form-group">
				<label for="email">Email</label>
				<input type="email" name="email" class="form-control" id="email">
			</fieldset>

			<fieldset class="form-group">
				<label for="password">Password</label>
				<input type="password" name="password" class="form-control" id="password">
			</fieldset>

			<fieldset class="form-group">
				<div class="text-center">
					<button class="btn btn-primary" type="submit">Create</button>
				</div>
			</fieldset>
		</form>
	</div>
</div>

@stop