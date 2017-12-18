@extends('admin.layouts.master')

@section('content')

<div class="row">
	<div class="col-md-3  text-center">
		<div class="card">
		    <div class="card-header bg-info text-white">
				POSTS
		    </div>
		    <div class="card-body">
		    	<h1>{{ $posts_count }}</h1>
		    </div>
		</div>
	</div>

	<div class="col-md-3  text-center">
		<div class="card">
		    <div class="card-header bg-danger text-white">
				TRASHED
		    </div>
		    <div class="card-body">
		    	<h1>{{ $trashed_count }}</h1>
		    </div>
		</div>
	</div>

	<div class="col-md-3  text-center">
		<div class="card">
		    <div class="card-header bg-dark text-white">
				USERS
		    </div>
		    <div class="card-body">
		    	<h1>{{ $users_count }}</h1>
		    </div>
		</div>
	</div>

	<div class="col-md-3  text-center">
		<div class="card">
		    <div class="card-header bg-success text-white">
				CATEGORIES
		    </div>
		    <div class="card-body">
		    	<h1>{{ $categories_count }}</h1>
		    </div>
		</div>
	</div>
</div>

@endsection
