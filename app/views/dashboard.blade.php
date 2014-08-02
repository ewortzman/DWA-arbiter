@extends('templates._master')

@section('title')
Dashboard
@stop

@section('content')

<div id="tabs">
	<ul class="nav nav-tabs" role="tablist">
	<?php $first=true ?>
	@foreach($roles as $role=>$assocs)
		<li @if($first)class="active"<?php $first=false; ?>@endif><a href="#{{$role}}" role="tab" data-toggle="tab">{{ $role }}</a></li>
	@endforeach
	</ul>
	<?php $first=true ?>
	@foreach($roles as $role=>$assocs)
	<?php $first=true ?>
	<div id="{{$role}}">
		@include(strtolower($role), ['role'=>strtolower($role), 'assocs'=>$assocs, 'assoc_lookup'=>$assoc_lookup])		
	</div>
	@endforeach
</div>

@stop

@section('script')

<script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<script type="text/javascript">
$(function() {
	$( "#tabs" ).tabs({show: 'fade', hide: 'fade'});
});

$("#tabs a").click(function(){
	console.log(this)
	$(this).parent().addClass("active")
	$(this).parent().siblings().removeClass("active")
})
</script>

@stop