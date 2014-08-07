@extends('templates._master')

@extends('templates.without-sidebar')

@section('jumbotron')
{{ Form::open(array('url'=>'/join-association','method'=>'POST')) }}
<select name="association" class="form-control">
@foreach($associations as $assoc)
	<option value={{$assoc->id}}>{{$assoc->name}}</option>
@endforeach
</select>
<button type="submit" class="btn btn-large btn-default">Submit</button>
{{ Form::close() }}
@stop