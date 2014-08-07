<div class="panel panel-default">
	<div class="panel-heading">
		Event #{{ $event->id }}
		<button id="backToSchedule" class="btn btn-xs btn-info" type="button" style="float: right">
			<i class="glyphicon glyphicon-arrow-left"></i> Back to Schedule
		</button>
	</div>

	<div class="panel-body">
		<?php 
		$query = http_build_query([
			"q"=>$event->location,
			"key"=>"AIzaSyAq7UOLutCDY4JnJ-PUeL3AfZOK4-Ike-M"
		])
		?>
		<div class="container">
			<div class="col-sm-5">
				<table class="eventTable">
					<tr>
						<th>Home:</th>
						<td>{{$event->home->name}}</td>
					</tr>
					<tr>
						<th>Visitors:</th>
						<td>
						@foreach($event->visitors as $team)
						{{$team->name}}<br>
						@endforeach
						</td>
					</tr>
					<tr>
						<th>Date:</th>
						<td>{{$event->start}}</td>					
					</tr>

				</table>

				<br>
				<br>
				<br>
				<div class="panel panel-info">
					<div class="panel-heading">
						Officials
						@if($role=="commissioner")
						<button id="addOfficial" class="btn btn-xs btn-success" type="button" style="float: right">
							<i class="glyphicon glyphicon-plus"></i> Add Official
						</button>
						@endif
					</div>
					<table class="table table-bordered" id="officialList">
						@if($event->officials)
						<thead>
							<tr>
								<th>Name</th>
							</tr>
						</thead>
						<tbody>
							@foreach($event->officials as $user)
							<tr>
								<td>{{$user->name}}</td>
							</tr>
							@endforeach
						</tbody>
						@endif
					</table>
				</div>
			</div>
			<div class="col-sm-5">
				<div class="row">
					<iframe frameborder="0" width="80%" height="300px" style="border:0" src="https://www.google.com/maps/embed/v1/place?{{$query}}"></iframe>
				</div>
				<div class="row">
					<table class="eventTable">
						<tr>
							<th>Location</th>
							<td>{{ $event->location }}</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="addFormDisplay" style="display:none">
		{{ Form::open([
			'id'=>'addForm',
		]) }}
			<div class="container-fluid" style="padding-left:0px">
				<div class="col-sm-11">
					<select id="newOfficialName" class="form-control typeahead input-sm" placeholder="Name"></select>
				</div>
				<div class="col-sm-1">
					<button type="submit" id="newOfficialButton" class="btn btn-success btn-sm">
						<i class="glyphicon glyphicon-ok"></i>
					</button>
				</div>
			</div>
		{{ Form::close() }}
</div>

<script type="text/javascript">
	$('#backToSchedule').click(function(){
		$.get('/schedule', {role:"{{$role}}", assoc:"{{$event->association->id}}"}, function(data){
			$('#{{$role}}Panel').html(data);
		});
	});

	$('#addOfficial').click(function(){
		$('#officialList > tbody:last').append("<tr><td>"+$('#addFormDisplay').html()+"</td></tr>");

		$('#addForm').submit(function(e){
			console.log('pressed');
			$.post('/event/{{$event->id}}', {intent:"addOfficial", id:$('#newOfficialName').val(), assoc:"{{$event->association->id}}"}, function(data){
				console.log(data);
				$('#officialList td:last').html(data.name);
				console.log($('#officialList td:last').html());
				console.log($('#officialList > tbody:last').html());
				console.log($('#addFormDisplay').html());
			});
			e.preventDefault();
		});

		$('.typeahead').selectize({
			valueField: 'id',
			labelField: 'name',
			searchField: 'name',
			options: [],
			create: false,
			render: {
				option: function(item, escape){
					return "<div><strong>"+item.name+"</strong><br>"+item.address+"</div>";
				}
			},
			load: function(query, callback){
				if (!query.length) return callback();
				$.get('/association/{{$event->association->id}}/members', function(data){
					callback(data);
				})
			}
		});
	});

</script>
