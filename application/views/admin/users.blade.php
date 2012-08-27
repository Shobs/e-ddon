@layout('layouts/frame')

<?php
$user = Auth::user();
$data = Session::get('users');
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
			{{HTML::link('#', 'Add', array('class' => 'small radius nice blue button', 'id' => 'addRow', 'data-reveal-id'=>'addUserModal'));}}
			{{HTML::link('#', 'Delete', array('class' => 'small radius nice blue button', 'id' => 'deleteRow', 'data-reveal-id'=>'deleteUserModal'));}}
			</div>
			<table id="facebox" class="dataTable tablesorter">
		       @include('includes.dataTable')
	      </table>
	      <div id="result" class="ten column"></div>
	      <div class="two columns">
	      	{{Form::button('Update', array('class' => 'small radius nice blue button btright', 'id' => 'usersUpdate'))}}
	      	<br>
			<br>
	      </div>
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

