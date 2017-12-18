@extends('admin.layouts.master')

@section('content')

<div class="card">
	<div class="card-header">
		All Tag
	</div>
	<div class="card-body p-0">
		<table class="table">
			<thead>
				<tr>
					<th class="w-75">Name</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				@if($tags->count() > 0)
					@foreach($tags as $tag)
						<tr>
							<td>{{ $tag->name }}</td>
							<td>
								<a class="btn btn-info btn-sm" href="{{ route('tags.edit', ['id' => $tag->id]) }}" role="button">Edit</a>
							</td>
							<td>
								<a class="btn btn-danger btn-sm" href="{{ route('tags.destroy', ['id' => $tag->id]) }}" role="button">Delete</a>
							</td>
						</tr>
					@endforeach
				@else
					<tr>
						<td colspan="3" class="text-center">There is no tag</td>
					</tr>
				@endif
			</tbody>
		</table>
	</div>
</div>

@stop