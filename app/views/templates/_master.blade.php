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
	<link rel="stylesheet" type="text/css" href="css/bootstrap-select.css">
	<link rel="stylesheet" type="text/css" href="css/master.css">
	<link rel="stylesheet" type="text/css" href="css/selectize.bootstrap3.css">

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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap-select.js"></script>
<script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<script src="js/selectize.js"></script>

@yield('script')
</body>
</html>
