@extends('templates._master')

@extends('templates.without-sidebar')

@section('jumbotron')

{{Form::open(array('url'=>'/new-team', 'method'=>'post'))}}
<select class="form-control" name="sport">
@foreach($sports as $sport)
	<option value={{$sport->id}}>{{$sport->name}}</option>
@endforeach
</select>
<select class="form-control" name="school">
@foreach($schools as $school)
	<option value={{$school->id}}>{{$school->name}}</option>
@endforeach
</select>
<input type="text" class="form-control" name="name" placeholder="Name">
<input type="text" class="form-control" name="level" placeholder="Level">
<select class="form-control" name="gender">
	<option val="boys">boys</option>
	<option val="girls">girls</option>
	<option val="coed">coed</option>
</select>

<button type="submit" class="btn btn-large btn-default">Submit</button>

{{Form::close()}}
@stop