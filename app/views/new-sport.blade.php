@extends('templates._master')

@extends('templates.without-sidebar')

@section('jumbotron')
{{Form::open(array('url'=>'/new-sport', 'method'=>'post'))}}
<input type="text" class="form-control" name="name" placeholder="Sport name">

<button type="submit" class="btn btn-large btn-default">Submit</button>
{{Form::close()}}
@stop