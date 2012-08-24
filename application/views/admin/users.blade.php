@layout('layouts/frame')

<?php
$user = Auth::user();
$users = Session::get('usersData');
?>

@section('content')

<div class="row">
	<div class="nine columns">
		<div class="twelve columns">
			<h1 class="mainTitle">all <span class="colorWord">Users</span></h1>
		</div>
		<div class=" tables twelve columns">
			<h3 class="sectionTitle"><span>Users information</span></h3>
			<table id="usersTable" class="dataTable">
        <thead>
          <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Lastname</th>
            <th>Firstname</th>
            <th>Role</th>
            <th>Temporary</th>
            <th>Visible</th>
            <th>Comments</th>
            <th>Created</th>
            <th>Updated</th>
          </tr>
        </thead>
          @foreach($users as $user)
          <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->username}}</td>
            <td>{{$user->lastname}}</td>
            <td>{{$user->firstname}}</td>
            <td>{{$user->role}}</td>
            <td>{{$user->temporary}}</td>
            <td>{{$user->visible}}</td>
            <td>{{$user->comments}}</td>
            <td>{{$user->created_at}}</td>
            <td>{{$user->updated_at}}</td>
          </tr>
          @endforeach
      </table>
		</div>
		<div class="twelve column">
			<h3 class="sectionTitle"><span>Change your password:</span></h3>
			<p>If you would like to change the password type a new one. Otherwise leave this blank.<br><br></p>
		</div>
		<div class="userForm six columns">

		</div>
		<div class="six columns">

		</div>
		<div class="nine columns"></div>
		<div class="three columns">

		</div>
	</div>
	<div class="three columns">
		<div id="secondary" class="widgetArea" role="complementary">
			@include('includes.menu')
		</div>
	</div>
</div>

</div>

@endsection

