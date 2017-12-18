@extends('admin.layouts.master')

@section('content')

<div class="card">
	<div class="card-header">
		All Category
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
				@if($categories->count() > 0)
					@foreach($categories as $category)
						<tr>
							<td>{{ $category->name }}</td>
							<td>
								<a class="btn btn-info btn-sm" href="{{ route('categories.edit', ['id' => $category->id ]) }}" role="button">Edit</a>
							</td>
							<td>
								<a class="btn btn-danger btn-sm" href="{{ route('categories.destroy', ['id' => $category->id ]) }}" role="button">Delete</a>
							</td>
						</tr>
					@endforeach
				@else
					<tr>
						<td colspan="3" class="text-center">There is no category</td>
					</tr>
				@endif
			</tbody>
		</table>
	</div>
</div>

@stop