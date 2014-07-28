@extends('templates._master')

@extends('templates.without-sidebar')

@section('jumbotron')
	{{ Form::open(array('url'=>'/login', 'method'=>'post', 'class'=>'form-horizontal', 'role'=>'form', 'id'=>'login')) }}
	<fieldset>
		<legend>Login</legend>
		<div class="form-group">
			<label for="email" class="control-label col-sm-2">Email</label>
			<div class="col-sm-10">
			{{ Form::email('email', '', array('class'=>'form-control', 'placeholder'=>'Email', 'id'=>'email')) }}
			</div>
		</div>
		<div class="form-group">
			<label for="password" class="control-label col-sm-2">Password</label>
			<div class="col-sm-10">
			{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password', 'id'=>'password'))}}
			</div>
		</div>		
		<div class="form-group">
			<label for="submit" class="control-label col-sm-2"></label>
			<div class="col-sm-2">
				<button type="submit" class="btn btn-large">
					Login <span class="glyphicon glyphicon-circle-arrow-right"></span>				
				</button>
				<a href="/register" style="font-size:14px">Register</a>
			</div>
			<div class="col-sm-2">
				<label class="control-label">{{ Form::checkbox('remember', '', false) }} Remember me</label>
			</div>
		</div>
	</fieldset>
	{{ Form::close() }}
@stop
