@extends('templates._master')

@extends('templates.without-sidebar')

@section('jumbotron')
<a href="/admin/new-sport"><button id="New Sport" class="btn btn-large btn-success">New Sport</button></a>
<a href="/admin/new-association"><button id="New Association" class="btn btn-large btn-success">New Association</button></a>
@stop