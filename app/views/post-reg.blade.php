@extends('templates._master')

@extends('templates.without-sidebar')

@section('jumbotron')
	<h1>Welcome {{ $user->first }}!</h1>

	<p>An email has been sent to {{ $user->email }} with a verification link.  Please click the link when the email arrives.</p>

	<a href="/">
		<button class="btn btn-large">Home</button>
	</a>
@stop