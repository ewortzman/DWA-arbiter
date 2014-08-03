@extends('templates.with-sidebar')

@section('sidebar-official')
<ul class="nav">
	<li class="active"><a href="#">Schedule</a></li>
	<li><a href="#">Blocks</a></li>
	<li><a href="#" class="parent">Associations</a>
		<ul class="nav" style="display:none;">
			<li style="padding-left:15px;">
			@foreach($assocs as $assoc)
				<a href="#">{{ $assoc_lookup[$assoc] }}</a>
			@endforeach
			</li>
		</ul>
	</li>
</ul>
@stop

@section('jumbotron-official')
<div id="jumbo">
	
</div>
@stop

@section('script')
@parent
<script type="text/javascript">
$('.parent').click(function() {
	console.log(this)
  var subMenu = $(this).siblings('ul');
  console.log(subMenu)
  if ($(subMenu).hasClass('open')) {
    $(subMenu).fadeOut();
    $(subMenu).removeClass('open').addClass('closed');
  }
  else {
    $(subMenu).fadeIn();
    $(subMenu).removeClass('closed').addClass('open');
  }
});

$(document).ready(function(){
	$.get('/schedule', function(data){
		$("#jumbo").html(data)
	})
})
</script>
@stop