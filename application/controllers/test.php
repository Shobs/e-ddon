<?php

class Test_Controller extends Base_Controller{

	// public $restful = true;

	public function action_index(){

		$user = User::find(7);


		$user->lastname = 'toto';


		$user->save();

	}

	public function post_users(){

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

	}
}

?>