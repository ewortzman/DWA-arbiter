<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>
	@section('title')
		Arbiter
	@show
	</title>

	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/lavish-bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/master.css">

	@yield('styles')

</head>
<body>
<nav id="navbar" class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"> </span>
				<span class="icon-bar"> </span>
				<span class="icon-bar"> </span>
			</button>
			<a class="navbar-brand" href="/">Arbiter</a>
		</div>
		<div class="collapse navbar-collapse" id="navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				@if(!preg_match("/^(login|register)/", Route::current()->getUri()))
					@if(Auth::check())
					<li>
						<label class="control-label">Welcome {{ ucwords(Auth::user()->first) }}!</label>
					</li>
					<li>
						<a href="/profile">Profile</a>
					</li>
					<li>
						<a href="/logout">Logout</a>
					</li>
					@else
					<li>
						<a href="/login">Login</a>
					</li>
					<li>
						<a href="/register">Register</a>
					</li>
					@endif
				@endif
			</ul>
		</div>
	</div>			
</nav>

<div class="container" style="padding-top:70px;">
@yield('content')
</div>


<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/typeahead.bundle.js"></script>

@yield('script')
</body>
</html>