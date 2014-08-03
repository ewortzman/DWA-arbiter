<div class="panel panel-default">
	<div class="panel-heading">
		Schedule
	</div>
	<div class="panel-body">
		<div>
			<select class="selectpicker" id="assocFilter">
				<option selected>All</option>
				@foreach($assocs as $assoc)
					<option>{{ $assoc->name }}</option>
				@endforeach
			</select>
		</div>
		<br>
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
					<td><a href="/event/{{$event->id}}">{{ $event->id }}</a></td>
					<td>{{ $event->start }}</td>
					<td>{{ $event->location }}</td>
					<td>
					<?php
					$home = $event->teams->filter(function($team){
							return $team->pivot->home;
					})->first();
					?>
					{{ $home->school->name }} {{ $home->name }}
					</td>
					<td>
						@foreach(
						$event->teams->filter(function($team){
							return !$team->pivot->home;
						})
						as $team)
						{{ $team->school->name }} {{ $team->name }}<br>
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