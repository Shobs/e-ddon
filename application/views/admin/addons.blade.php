@layout('layouts/frame')

<?php
$user = Auth::user();
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
      <table class="dataTables">
        <thead>
          <tr>
            <th>ID</th>
            <th>Visible</th>
            <th>Select</th>
            <th>Cat</th>
            <th>Name</th>
            <th>User ID</th>
            <th>Author</th>
            <th>Version</th>
            <th>Rating</th>
            <th>Dwnld</th>
            <th>Created</th>
            <th>Updated</th>
          </tr>
        </thead>
        <tbody>
          @foreach($addons as $addon)
          <tr>
            <td>{{$addon->id}}</td>
            <td>{{$addon->visible}}</td>
            <td>{{$addon->selected}}</td>
            <td>{{$addon->category}}</td>
            <td>{{$addon->name}}</td>
            <td>{{$addon->user_id}}</td>
            <td>{{$addon->author}}</td>
            <td>{{$addon->version}}</td>
            <td>{{$addon->rating}}</td>
            <td>{{$addon->downloaded}}</td>
            <td>{{$addon->created_at}}</td>
            <td>{{$addon->updated_at}}</td>
          </tr>
          @endforeach
        </tbody>
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

