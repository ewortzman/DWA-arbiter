@extends('templates.with-sidebar')

@section('sidebar-official')
<ul class="nav">
	<li id="sidebar-home"><a href="#">Home</a></li>
	<li id="sidebar-sched"><a href="#">Schedule</a></li>
	<li id="sidebar-block"><a href="#">Blocks</a></li>
	<li><a href="#" class="parent">Associations <i class="glyphicon glyphicon-chevron-right"></i></a>
		<ul class="nav" style="display:none;">
			@foreach($assocs as $assoc)
			<li style="padding-left:15px;" class="sidebar-assoc" target="{{ $assoc }}">
				<a href="#">{{ $assoc_lookup[$assoc] }}</a>
			</li>
			@endforeach
		</ul>
	</li>
</ul>
@stop

@section('jumbotron-official')
<div id="officialPanel">
	
</div>
@stop

@section('script')
@parent
<script type="text/javascript">
$('.parent').click(function() {
  var subMenu = $(this).siblings('ul');
  if ($(subMenu).hasClass('open')) {
    $(subMenu).fadeOut();
    $(subMenu).removeClass('open').addClass('closed');
  }
  else {
    $(subMenu).fadeIn();
    $(subMenu).removeClass('closed').addClass('open');
  }
});

$('#sidebar-home').click(function(){
	$("#officialPanel").html("")
})

$('#sidebar-sched').click(function(){
	$.get('/schedule', { role: "official", association: "{{ $assoc_lookup[$assocs[0]] }}" }, function(data){
		$("#officialPanel").html(data)
	})
})

$('#sidebar-block').click(function(){
	$.get('/blocks', { role: "official", association: "{{ $assoc_lookup[$assocs[0]] }}" }, function(data){
		$("#officialPanel").html(data)
	})
})

$('.sidebar-assoc').click(function(){
	$.get('/association/'+$(this).attr("target"), function(data){
		$("#officialPanel").html(data)
	})
})
</script>
@stop