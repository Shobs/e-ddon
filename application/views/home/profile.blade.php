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
				<p>Feel free to complete or modify your profile information</p>
			</div>
		</div>
		{{Form::open('profile/user', 'post')}};
		<div>
			<h3 class="sectionTitle"><span>Your profile information</span></h3>

			<p class="userForm six columns">
				{{Form::label('email', 'Email', array('class' => 'label'));}}<span>{{$errors->first('username');}}</span>
				{{Form::email('email', '', array('class' => 'input','placeholder' => $user->username));}}

				{{Form::label('firstname', 'Firstname', array('class' => 'label'));}}<span>{{$errors->first('firstname');}}</span>
				{{Form::input('text', 'firstname', '', array('class' => 'input', 'placeholder' => Str::title($user->firstname), 'id' => 'firstname', 'pattern' => '[A-Za-z]+'));}}
			</p>
			<p class="userForm six columns">
				{{Form::label('lastname', 'Lastname', array('class' => 'label'));}}<span>{{$errors->first('lastname');}}</span>
				{{Form::input('text', 'lastname', '', array('class' => 'input', 'placeholder' => Str::title($user->lastname), 'id' => 'lastname', 'pattern' => '[A-Za-z]+'));}}

				{{Form::label('birthdate', 'Birthdate', array('class' => 'label'));}}<span>{{$errors->first('birthdate');}}</span>
				{{Form::input('text', 'birthdate','', array('class' => 'input', 'placeholder' => $user->birthdate, 'id' => 'birthdate', 'pattern' => '(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))'));}}
			</p>
		</div>
		<div>
			<h3 class="sectionTitle"><span>Change your password:</span></h3>
			<p>If you would like to change the password type a new one. Otherwise leave this blank.<br><br></p>
			<div class="userForm six columns">
				<p>
					{{Form::label('pass1', 'New Password', array('class' => 'label'));}}<span>{{$errors->first('password');}}</span>
					{{Form::password('pass1', array('id' => 'password','class' => 'input','placeholder' => 'Enter your password'));}}

					{{Form::label('pass2', 'Type your new password again.', array('class' => 'label'));}}
					{{Form::password('pass2', array('id' => 'password','class' => 'input','placeholder' => 'Enter your password'));}}
				</p>
			</div>
			<div class="six columns">
				<div id="pass-strength-result" style="">Strength indicator</div>
				<p class="description indicator-hint">Hint: The password should be at least seven characters long. To make it stronger, use upper and lower case letters and numbers).</p>
			</div>
			<div class="nine columns"></div>
			<div class="three columns">
				{{Form::submit('Update profile', array('class' => 'small radius nice blue button btright', 'name' => 'submit', 'id' => 'profileSubmit'));}}
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

