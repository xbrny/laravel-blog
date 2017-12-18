@extends('admin.layouts.master')

@section('content')

<div class="card">
	<div class="card-header">
		Edit Profile
	</div>
	<div class="card-body">

		@include('admin.shared.errors')

		<form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
			
			{{ csrf_field() }}

			<fieldset class="form-group">
				<label for="name">Name</label>
				<input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}">
			</fieldset>

			<fieldset class="form-group">
				<label for="email">Email</label>
				<input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}">
			</fieldset>

			<fieldset class="form-group">
				<label for="password">New Password</label>
				<input type="password" name="password" class="form-control" id="password">
				<small class="text-muted">
					Leave password field empty if you don't want to change your password.
				</small>
			</fieldset>

			<fieldset class="form-group">
				<label for="avatar">Choose New Avatar</label>
				<input type="file" name="avatar" class="form-control">
			</fieldset>

			<fieldset class="form-group">
				<label for="about">About</label>
				<textarea name="about" id="about" rows="8" class="form-control">{{ $user->profile->about }}</textarea>
			</fieldset>

			<fieldset class="form-group">
				<label for="facebook">Facebook</label>
				<input type="text" name="facebook" class="form-control" id="facebook" value="{{ $user->profile->facebook }}">
			</fieldset>

			<fieldset class="form-group">
				<label for="youtube">Youtube</label>
				<input type="text" name="youtube" class="form-control" id="youtube" value="{{ $user->profile->youtube }}">
			</fieldset>

			<fieldset class="form-group text-center">
				<button type="submit" class="btn btn btn-primary">Update</button>
			</fieldset>

		</form>
	</div>
</div>

@stop