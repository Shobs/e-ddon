@layout('layouts/frame')

<?php
$user = Auth::user();
$data = Session::get('addonsDisplay');
$addons = Session::get('addons');
?>

@section('content')

<div class="row">
	<div class="nine columns">
		<div class="twelve columns">
			<h1 class="mainTitle">user <span class="colorWord">Addons</span></h1>
		</div>
		<div class="twelve columns">
			<h3 class="sectionTitle"><span>Addons information</span></h3>
			<div>
			{{HTML::link('#', 'Add', array('class' => 'small radius nice blue button', 'id' => 'addRow', 'data-reveal-id'=>'uploadModal'));}}
			{{HTML::link('#', 'Delete', array('class' => 'small radius nice blue button', 'id' => 'deleteRow', 'data-reveal-id'=>'deleteAddonModal'));}}
			</div>
			<table id="facebox" class="dataTable tablesorter">
		       @include('includes.dataTable')
	      </table>
	      <div id="result" class="ten column"></div>
	      <div class="two columns">
	      	{{Form::button('Update', array('class' => 'small radius nice blue button btright', 'id' => 'addonsUpdate'))}}
	      	<br>
			<br>
	      </div>
		</div>
		<div class="twelve column">
			<h3 class="sectionTitle"><span>Modify addon :</span></h3>
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

