@extends('templates._master')

@extends('templates.without-sidebar')

@section('jumbotron')
	{{ Form::open(array('url'=>'/register', 'method'=>'POST', 'class'=>'form-horizontal', 'role'=>'form', 'id'=>'registration')) }}
	<fieldset>
		<legend>Registration Form</legend>
		<div class="form-group" >
			<label for="email" class="control-label col-sm-2">Email</label>
			<div class="col-sm-10">
			{{ Form::email('email', '', array('class'=>'form-control', 'placeholder'=>'Email', 'id'=>'email'))}}
			</div>
		</div>
		<div class="form-group">
			<label for="password" class="control-label col-sm-2">Password</label>
			<div class="col-sm-10">
			{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password', 'id'=>'password'))}}
			</div>
		</div>
		<div class="form-group">
			<label for="confirm-password" class="control-label col-sm-2">Confirm Password</label>
			<div class="col-sm-10">
			{{ Form::password('confirm-password', array('class'=>'form-control', 'placeholder'=>'Confirm Password', 'id'=>'confirm-password')) }}
			</div>
		</div>
		<br>
		<div class="form-group">
			<label for="first" class="control-label col-sm-2">First Name</label>
			<div class="col-sm-4">
			{{ Form::text('first', '', array('class'=>'form-control', 'placeholder'=>'First Name', 'id'=>'first')) }}
			</div>
			<label for="last" class="control-label col-sm-2">Last Name</label>
			<div class="col-sm-4">
			{{ Form::text('last', '', array('class'=>'form-control', 'placeholder'=>'Last Name', 'id'=>'last')) }}
			</div>
		</div>
		<div class="form-group">
			<label for="street" class="control-label col-sm-2">Address</label>
			<div class="col-sm-10">
			{{ Form::text('street', '', array('class'=>'form-control', 'placeholder'=>'Street Address', 'id'=>'street')) }}
			</div>
		</div>
		<div class="form-group">
			<label for="city" class="control-label col-sm-2"></label>
			<div class="col-sm-4">
			{{ Form::text('city', '', array('class'=>'form-control', 'placeholder'=>'City', 'id'=>'city')) }}
			</div>
			<div class="col-sm-3">
				<select name="state" id="state" class="form-control">
					<option value="AL">Alabama</option>
					<option value="AK">Alaska</option>
					<option value="AZ">Arizona</option>
					<option value="AR">Arkansas</option>
					<option value="CA">California</option>
					<option value="CO">Colorado</option>
					<option value="CT">Connecticut</option>
					<option value="DE">Delaware</option>
					<option value="DC">District of Columbia</option>
					<option value="FL">Florida</option>
					<option value="GA">Georgia</option>
					<option value="HI">Hawaii</option>
					<option value="ID">Idaho</option>
					<option value="IL">Illinois</option>
					<option value="IN">Indiana</option>
					<option value="IA">Iowa</option>
					<option value="KS">Kansas</option>
					<option value="KY">Kentucky</option>
					<option value="LA">Louisiana</option>
					<option value="ME">Maine</option>
					<option value="MD">Maryland</option>
					<option value="MA">Massachusetts</option>
					<option value="MI">Michigan</option>
					<option value="MN">Minnesota</option>
					<option value="MS">Mississippi</option>
					<option value="MO">Missouri</option>
					<option value="MT">Montana</option>
					<option value="NE">Nebraska</option>
					<option value="NV">Nevada</option>
					<option value="NH">New Hampshire</option>
					<option value="NJ">New Jersey</option>
					<option value="NM">New Mexico</option>
					<option value="NY">New York</option>
					<option value="NC">North Carolina</option>
					<option value="ND">North Dakota</option>
					<option value="OH">Ohio</option>
					<option value="OK">Oklahoma</option>
					<option value="OR">Oregon</option>
					<option value="PA">Pennsylvania</option>
					<option value="RI">Rhode Island</option>
					<option value="SC">South Carolina</option>
					<option value="SD">South Dakota</option>
					<option value="TN">Tennessee</option>
					<option value="TX">Texas</option>
					<option value="UT">Utah</option>
					<option value="VT">Vermont</option>
					<option value="VA">Virginia</option>
					<option value="WA">Washington</option>
					<option value="WV">West Virginia</option>
					<option value="WI">Wisconsin</option>
					<option value="WY">Wyoming</option>
				</select>
			</div>
			<div class="col-sm-3">
			{{ Form::text('zip', '', array('class'=>'form-control', 'id'=>'zip', 'pattern'=>'\\d*', 'placeholder'=>'ZIP')) }}
			</div>
		</div>
		<div class="form-group">
			<label for="phone" class="control-label col-sm-2">Phone Number</label>
			<div class="col-sm-10">
			{{ Form::text('phone', '', array('class'=>'form-control', 'id'=>'phone', 'placeholder'=>'Phone Number')) }}
			</div>
		</div>
		<div class="form-group">
			<label for="submit" class="control-label col-sm-2"></label>
			<div class="col-sm-2">
				<button type="submit" class="btn btn-large">
					Register <span class="glyphicon glyphicon-circle-arrow-right"></span>				
				</button>
				<a href="/login" style="font-size:14px">Login</a>
			</div>
		</div>


	</fieldset>
	{{ Form::close() }}
@stop
