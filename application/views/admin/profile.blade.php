@layout('home/profile')

<?php $user = Auth::user(); ?>

@section('adminRole')
@if(Auth::user()->role == 100)
	{{Form::label('role', 'Role', array('class' => 'label'));}}<span>{{$errors->first('role');}}</span>
	{{Form::input('text', 'role', '', array('class' => 'input', 'placeholder' => Str::title($user->role), 'id' => 'role', 'pattern' => '[0-9]+'));}}
@endif
@endsection