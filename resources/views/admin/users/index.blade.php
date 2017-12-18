@extends('admin.layouts.master')

@section('content')

<div class="card">
	<div class="card-header">
		Users
	</div>
	<div class="card-body">
		<table class="table">
			<thead>
				<tr>
					<th>Avatar</th>
					<th>Name</th>
					<th>Permission</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				@if($users->count() > 0)
					@foreach($users as $user)
						<tr>
							<td>
								<img src="{{ $user->profile->avatar }}" width="30" height="30">
							</td>
							<td>
								<a href="#">{{ $user->name }}</a>
							</td>
							<td>
								@if($user->admin)
									<a href="{{ route('users.unadmin', ['id' => $user->id]) }}" class="btn btn-sm btn-danger">Remove Permission</a>
								@else
									<a href="{{ route('users.admin', ['id' => $user->id]) }}" class="btn btn-sm btn-success">Make Admin</a>
								@endif
							</td>
							<td>
								@if(auth()->id() != $user->id)
									<a href="{{ route('users.destroy', ['id' => $user->id]) }}" class="btn btn-sm btn-danger">Delete</a>
								@endif
							</td>
						</tr>
					@endforeach
				@else
					<tr>
						<td colspan="4" class="text-center">No user</td>
					</tr>
				@endif
			</tbody>
		</table>
	</div>
</div>

@stop