@extends('admin.layouts.master')

@section('content')

<div class="card">
	<div class="card-body">
		<h2>{{ $post->title }}</h2>
		<hr>
		{{ $post->body }}
	</div>
</div>

@stop