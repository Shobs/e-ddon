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
		<div class="twelve columns">
			<h3 class="sectionTitle"><span>Users information</span></h3>
			<div>
			{{Form::button('Add', array('class' => 'small radius nice blue button', 'id' => 'addRow'))}}
			{{Form::button('Delete', array('class' => 'small radius nice blue button', 'id' => 'deleteRow'))}}
			</div>
			<table id="usersTable" class="dataTable tablesorter">
		        <thead>
		          <tr>
		            <th>ID<span></span></th>
		            <th>Username<span></span></th>
		            <th>Lastname<span></span></th>
		            <th>Firstname<span></span></th>
		            <th>Role<span></span></th>
		            <th>Temporary<span></span></th>
		            <th>Visible<span></span></th>
		            <th>Comments<span></span></th>
		            <th>Created<span></span></th>
		            <th>Updated<span></span></th>
		          </tr>
		        </thead>
		        <tbody>
		          @foreach($users as $user)
		          <tr id="{{$user->id}}" class="tr_edit">
		          	<td class="td_edit">
		            	<span id="userid_{{$user->id}}" class="cell_text">{{$user->id}}</span>
		            </td>
		            <td class="td_edit">
		            	<span id="username_{{$user->id}}" class="cell_text">{{$user->username}}</span>
		            	{{Form::input('text', '', $user->username, array('class' => 'cell_edit_box', 'id' => 'username_input_'.$user->id));}}
		            </td>
		            <td class="td_edit">
		            	<span id="lastname_{{$user->id}}" class="cell_text">{{$user->lastname}}</span>
		            	{{Form::input('text', '', $user->lastname, array('class' => 'cell_edit_box', 'id' => 'lastname_input_'.$user->id));}}
		            </td>
		            <td class="td_edit">
		            	<span id="firstname_{{$user->id}}" class="cell_text">{{$user->firstname}}</span>
		            	{{Form::input('text', '', $user->firstname, array('class' => 'cell_edit_box', 'id' => 'firstname_input_'.$user->id));}}
		            </td>
		            <td class="td_edit">
		            	<span id="role_{{$user->id}}" class="cell_text">{{$user->role}}</span>
		            	{{Form::input('text', '', $user->role, array('class' => 'cell_edit_box', 'id' => 'role_input_'.$user->id));}}
		            </td>
		            <td class="td_edit">
		            	<span id="temporary_{{$user->id}}" class="cell_text">{{$user->temporary}}</span>
		            	{{Form::input('text', '', $user->temporary, array('class' => 'cell_edit_box', 'id' => 'temporary_input_'.$user->id));}}
		            </td>
		            <td class="td_edit">
		            	<span id="visible_{{$user->id}}" class="cell_text">{{$user->visible}}</span>
		            	{{Form::input('text', '', $user->visible, array('class' => 'cell_edit_box', 'id' => 'visible_input_'.$user->id));}}
		            </td>
		            <td class="td_edit">
		            	<span id="comments_{{$user->id}}" class="cell_text">{{$user->comments}}</span>
		            	{{Form::input('text', '', $user->comments, array('class' => 'cell_edit_box', 'id' => 'comments_input_'.$user->id));}}
		            </td>
		            <td class="td_edit">
		            	<span id="created_{{$user->id}}" class="cell_text">{{$user->created_at}}</span>
		            	{{Form::input('text', '', $user->created_at, array('class' => 'cell_edit_box', 'id' => 'created_input_'.$user->id));}}
		            </td>
		            <td class="td_edit">
		            	<span id="updated_{{$user->id}}" class="cell_text">{{$user->updated_at}}</span>
		            	{{Form::input('text', '', $user->updated_at, array('class' => 'cell_edit_box', 'id' => 'updated_input_'.$user->id));}}
		            </td>
		          </tr>
		          @endforeach
	          </tbody>
	      </table>
	      <div id="result" class="ten column"></div>
	      <div class="two columns">
	      	{{Form::button('Update', array('class' => 'small radius nice blue button btright', 'id' => 'usersUpdate'))}}
	      </div>
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

