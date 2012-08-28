@layout('layouts/frame')

<?php $user = Auth::user(); ?>

@section('content')

<div class="row">
	<div class="nine columns">
		<div class="twelve columns">
			<h1 class="mainTitle">user <span class="colorWord">Files</span></h1>
			<div class="userInfo clearfix">
				<div class="userEntry">
					<p>Feel free to complete or modify your profile information</p>
				</div>
			</div>
		</div>
		<div class="twelve columns">
			<h3 class="sectionTitle"><span>Your files</span></h3>
			<div id="files"></div>

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

