@layout('layouts/frame')


@section('content')

<?php
$user = Auth::user();

// var_dump($user);
?>

<div class="row">
	<div class="nine columns">

		<h1 class="mainTitle">your <span class="colorWord">Profile</span></h1>
		<div class="userInfo clearfix">
			<div class="userEntry">
				<h3 class="entryTitle">Welcome, <span class="colorWord">{{$user->firstname}}</span></h3>
				<p>Feel free to complete or modify your profile information</p>
			</div>
		</div>
		{{Form::open('profile', 'post')}};
		<div>
			<h3 class="sectionTitle"><span>Your profile information</span></h3>

			<p class="six columns">
				{{Form::label('email', 'Email', array('class' => 'label'));}}
				{{Form::email('email', '', array('class' => 'input','placeholder' => $user->username, 'required' => 'required'));}}

				{{Form::label('firstname', 'Firstname', array('class' => 'label'));}}
				{{Form::input('text', 'firstname', '', array('class' => 'input', 'placeholder' => $user->firstname, 'id' => 'firstname', 'required' => 'required', 'pattern' => '[A-Za-z]+'));}}
			</p>
			<p class="six columns">
				{{Form::label('lastname', 'Lastname', array('class' => 'label'));}}
				{{Form::input('text', 'lastname', '', array('class' => 'input', 'placeholder' => $user->lastname, 'id' => 'lastname', 'required' => 'required', 'pattern' => '[A-Za-z]+'));}}

				{{Form::label('birthdate', 'Birthdate', array('class' => 'label'));}}
				{{Form::input('text', 'birthdate','', array('class' => 'input', 'placeholder' => $user->birthdate, 'id' => 'birthdate', 'required' => 'required', 'pattern' => '(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))'));}}
			</p>
		</div>
		<div>
			<h3 class="sectionTitle"><span>Change your password:</span></h3>
			<p>If you would like to change the password type a new one. Otherwise leave this blank.<br><br></p>
			<div class="six columns">
				<p>
					{{Form::label('pass1', 'New Password', array('class' => 'label'));}}
					{{Form::password('pass1', array('id' => 'password','class' => 'input','placeholder' => 'Enter your password', 'required' => 'required', 'pattern' => '(?=^.{8,}$)^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$'));}}
					{{Form::label('pass2', 'Type your new password again.', array('class' => 'label'));}}
					{{Form::password('pass2', array('id' => 'password','class' => 'input','placeholder' => 'Enter your password', 'required' => 'required', 'pattern' => '(?=^.{8,}$)^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$'));}}
				</p>
			</div>
			<div class="six columns">
				<div id="pass-strength-result" style="">Strength indicator</div>
				<p class="description indicator-hint">Hint: The password should be at least seven characters long. To make it stronger, use upper and lower case letters and numbers).</p>
			</div>
			<div class="nine columns"></div>
			<div class="three columns">
				{{Form::submit('Update profile', array('class' => 'small radius nice blue button btright', 'name' => 'submit', 'id' => 'submit'));}}
			</div>
			{{Form::close();}}
		</div>
	</div>
	<div class="three columns">
		<div id="secondary" class="widgetArea" role="complementary">
			@include('includes.menu')
		</div>
	</div>
</div>

@endsection

