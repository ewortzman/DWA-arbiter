@extends('templates._master')

@extends('templates.without-sidebar')

@section('jumbotron')
{{Form::open(array('url'=>'/new-association', 'method'=>'POST'))}}

<input type="text" class="form-control" name="name" placeholder="Name">

<select class="form-control" name="sport">
@foreach($sports as $sport)
	<option value={{$sport->id}}>{{$sport->name}}</option>
@endforeach
</select>

<button type="submit" class="btn btn-large btn-default">Submit</button>

{{Form::close()}}
@stop