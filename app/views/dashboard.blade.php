@extends('templates._master')

@section('title')
Dashboard
@stop

@extends('templates.with-sidebar')

@section('sidebar')
<ul class="nav list-unstyled">

@foreach($roles as $role=>$assocs)
	<li class="nav-header">
		<a href="#" data-toggle="collapse" data-target="#{{$role}}menu">
			<h5>{{$role}}<i class="glyphicon glyphicon-chevron-right"></i></h5>
		</a>
		<ul class="list-unstyled collapse" id="{{$role}}menu">
			@foreach($assocs as $assoc)
			<li><a href="">{{$assoc_lookup[$assoc]}}</a></li>
			@endforeach
			<li><a href="#"></a></li>
		</ul>
	</li>
@endforeach


	<li class="nav-header">
		<a href="#" data-toggle="collapse" data-target="#userMenu">
			<h5>Settings <i class="glyphicon glyphicon-chevron-right"></i></h5>
		</a>
		<ul class="list-unstyled collapse" id="userMenu">
			<li class="active"> <a href="#"><i class="glyphicon glyphicon-home"></i> Home</a></li>
			<li><a href="#"><i class="glyphicon glyphicon-envelope"></i> Messages <span class="badge badge-info">4</span></a></li>
			<li><a href="#"><i class="glyphicon glyphicon-cog"></i> Options</a></li>
			<li><a href="#"><i class="glyphicon glyphicon-comment"></i> Shoutbox</a></li>
			<li><a href="#"><i class="glyphicon glyphicon-user"></i> Staff List</a></li>
			<li><a href="#"><i class="glyphicon glyphicon-flag"></i> Transactions</a></li>
			<li><a href="#"><i class="glyphicon glyphicon-exclamation-sign"></i> Rules</a></li>
			<li><a href="#"><i class="glyphicon glyphicon-off"></i> Logout</a></li>
		</ul>
	</li>
	<li class="nav-header"> 
		<a href="#" data-toggle="collapse" data-target="#menu2">
			<h5>Reports <i class="glyphicon glyphicon-chevron-right"></i></h5>
		</a>
		<ul class="list-unstyled collapse" id="menu2">
			<li><a href="#">Information &amp; Stats</a>
			</li>
			<li><a href="#">Views</a>
			</li>
			<li><a href="#">Requests</a>
			</li>
			<li><a href="#">Timetable</a>
			</li>
			<li><a href="#">Alerts</a>
			</li>
		</ul>
	</li>
	<li class="nav-header">
		<a href="#" data-toggle="collapse" data-target="#menu3">
			<h5>Social Media <i class="glyphicon glyphicon-chevron-right"></i></h5>
		</a>
		<ul class="list-unstyled collapse" id="menu3">
			<li><a href="#"><i class="glyphicon glyphicon-circle"></i> Facebook</a></li>
			<li><a href="#"><i class="glyphicon glyphicon-circle"></i> Twitter</a></li>
		</ul>
	</li>

</ul>
@stop

@section('jumbotron')
Placeholder
@stop

@section('script')
<script type="text/javascript">
$(".alert").addClass("in").fadeOut(4500);

/* swap open/close side menu icons */
$('[data-toggle=collapse]').click(function(){
  	// toggle icon
  	$(this).find("i").toggleClass("glyphicon-chevron-right glyphicon-chevron-down");
});
</script>
@stop