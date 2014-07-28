@extends('templates._master')

@section('title')
Dashboard
@stop

@extends('templates.with-sidebar')

@section('sidebar')
<ul class="nav">
	<li>
		<a href="#">link 1</a>
	</li>
	<li>
		<a href="#">link 2</a>
	</li>
	<li>
		<a href="#">link 3</a>
	</li>
</ul>
@stop

@section('jumbotron')
Dashboard Placeholder
@stop