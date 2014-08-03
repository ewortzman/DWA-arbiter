<div class="panel-heading">
	Schedule
</div>
<div class="panel-body">
	<table class="table table-bordered table-condensed table-hover">
		<thead>
			<tr>
				<th>Event id</th>
				<th>Location</th>
				<th>Participants</th>
			</tr>
		</thead>
		<tbody>
			@foreach($events as $event)
			<tr>
				<td><a href="/event/{{$event->id}}">{{ $event->id }}</a></td>
				<td>{{ $event->location }}</td>
				<td>
					@foreach($event->teams as $team)
					{{ $team->school->name }} {{ $team->name }}<br>
					@endforeach
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>