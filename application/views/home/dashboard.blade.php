@layout('layouts/modal')


@section('content')
<?php $user = Auth::user()->get();
var_dump($user);
?>


@endsection

