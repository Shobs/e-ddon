@layout('layouts/frame')

<?php $user = Auth::user(); ?>

@section('content')

<div class="row">
	<div class="nine columns">
		<div class="twelve columns">
			<h1 class="mainTitle">your <span class="colorWord">Dashboard</span></h1>
			<div class="userInfo clearfix">
				<div class="userEntry">
					<p>At some point there will be something here, but today is not the day!</p>
				</div>
			</div>
		</div>
		<div class="twelve columns">
			<h3 class="sectionTitle"><span>Your website traffic</span></h3>


		</div>
		<div class="twelve column">
			<!-- <h3 class="sectionTitle"><span>Change your password:</span></h3>
			<p>If you would like to change the password type a new one. Otherwise leave this blank.<br><br></p> -->
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

