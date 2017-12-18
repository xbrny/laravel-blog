@extends('admin.layouts.master')

@section('content')

<div class="card">
	<div class="card-header">
		Update Site Settings
	</div>
	<div class="card-body">
		@include('admin.shared.errors')
		
		<form method="post" action="{{ route('settings.update') }}">
			{{ csrf_field() }}

			<fieldset class="form-group">
				<label for="name">Site Name</label>
				<input type="text" name="site_name" class="form-control" id="name" value="{{ $settings->site_name }}">
			</fieldset>

			<fieldset class="form-group">
				<label for="address">Address</label>
				<textarea name="address" id="address" rows="5" class="form-control">{{ $settings->address }}</textarea>
			</fieldset>

			<fieldset class="form-group">
				<label for="contact_number">Contact Number</label>
				<input type="text" name="contact_number" class="form-control" id="contact_number" value="{{ $settings->contact_number }}">
			</fieldset>

			<fieldset class="form-group">
				<label for="contact_email">Contact Email</label>
				<input type="text" name="contact_email" class="form-control" id="contact_email" value="{{ $settings->contact_email }}">
			</fieldset>

			<fieldset class="form-group">
				<div class="text-center">
					<button class="btn btn-primary" type="submit">Update</button>
				</div>
			</fieldset>
		</form>
	</div>
</div>

@stop