<div class="panel panel-default">
	<div class="panel-heading">
		Schedule
	</div>
	<div class="panel-body">
		<table class="table table-bordered table-condensed table-hover">
			<thead>
				<tr>
					<th>Event id</th>
					<th>Date</th>
					<th>Location</th>
					<th>Home</th>
					<th>Visitor</th>
					<th>Fee</th>
				</tr>
			</thead>
			<tbody>
				@foreach($events as $event)
				<tr class="{{ $event->association->name }}">
					<td><a href="#" class="{{$role}}-event-link" event="{{$event->id}}">{{ $event->id }}</a></td>
					<td>{{ $event->start }}</td>
					<td>{{ $event->location }}</td>
					<td>
					{{ $event->home->name }}
					</td>
					<td>
						@foreach($event->visitors as $team)
						{{ $team->name }}<br>
						@endforeach
					</td>
					<td>{{ $event->fee }}</td>
				</tr>
				<tr>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>


<script type="text/javascript">
	$('.{{$role}}-event-link').click(function(){
		$.get('/event/'+$(this).attr('event'), {role: "{{$role}}"}, function(data){
			$("#{{$role}}Panel").html(data)
		})
	})
</script>