@extends('templates.with-sidebar')

@section('sidebar-commissioner')
<ul class="nav">
	<li id="sidebar-home"><a href="#">Home</a></li>
	<li id="sidebar-new"><a href="#">New Event</a></li>
	<li><a href="#" class="parent" data-toggle="collapse">Assignments <i class="glyphicon glyphicon-chevron-right"></i></a>
		<ul class="nav" style="display:none;">
			@foreach($assocs as $assoc)
			<li style="padding-left:15px;" class="sidebar-assoc" target="{{$assoc}}">
				<a href="#">{{ $assoc_lookup[$assoc] }}</a>
			</li>
			@endforeach
		</ul>
	</li>
</ul>
@stop

@section('jumbotron-commissioner')
<div id="commissionerPanel"></div>
@stop

@section('script')
@parent
<script type="text/javascript">
$('.parent').click(function(){
	// toggle icon
	$(this).find("i").toggleClass("glyphicon-chevron-right glyphicon-chevron-down");
});

$('#sidebar-home').click(function(){
	$("#commissionerPanel").html("")
})

$('.sidebar-assoc').click(function(){
	$.get('/schedule', {role:"commissioner", assoc:$(this).attr("target")}, function(data){
		$("#commissionerPanel").html(data)
	})
})

</script>
@stop