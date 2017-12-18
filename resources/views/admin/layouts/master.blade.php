<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>My Blog App</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

		<link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">

		@yield('links')
	</head>
	<body>
		<nav class="navbar navbar-expand navbar-light bg-light">
			<div class="container">
				<a href="#" class="navbar-brand">Blog</a>
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="{{ route('logout') }}" onclick="
						event.preventDefault();
						document.querySelector('#logout-form').submit();
						">Logout</a>
						<form method="POST" action="{{ route('logout') }}" style="display: none;" id="logout-form">
							{{ csrf_field() }}
						</form>
					</li>
				</ul>
			</div>
		</nav>		
	

		<div class="container mt-5">
			<div class="row">
				<div class="col-md-4">
					<ul class="list-group">
						<li class="list-group-item"><a href="{{ route('home') }}">Home</a></li>
						<li class="list-group-item"><a href="{{ route('posts') }}">Posts</a></li>
						<li class="list-group-item"><a href="{{ route('tags') }}">Tags</a></li>
						<li class="list-group-item"><a href="{{ route('categories') }}">Categories</a></li>
						@if(auth()->user()->admin)
							<li class="list-group-item"><a href="{{ route('users') }}">Users</a></li>
						@endif
						<li class="list-group-item"><a href="{{ route('profile') }}">My profile</a></li>
						<li class="list-group-item"><a href="{{ route('posts.create') }}">Create Post</a></li>
						<li class="list-group-item"><a href="{{ route('tags.create') }}">Create Tag</a></li>
						<li class="list-group-item"><a href="{{ route('categories.create') }}">Create Category</a></li>
						<li class="list-group-item"><a href="{{ route('users.create') }}">Create User</a></li>
						<li class="list-group-item"><a href="{{ route('posts.trashed') }}">Trashed Post</a></li>
						<li class="list-group-item"><a href="{{ route('settings') }}">Settings</a></li>
					</ul>
				</div>
				<div class="col-md-8">
				  	@yield('content')
				</div>
			</div>
		</div>

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="{{ asset('app/js/jquery-2.1.4.min.js') }}"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>

		<script src="{{ asset('js/toastr.min.js') }}"></script>

		<script>
			@if(session()->has('success'))
				toastr.success("{{ session('success') }}")
			@elseif(session()->has('error'))
				toastr.error("{{ session('error') }}")
			@elseif(session()->has('info'))
				toastr.info("{{ session('info') }}")
			@endif
		</script>
		@yield('scripts')
	</body>
</html>