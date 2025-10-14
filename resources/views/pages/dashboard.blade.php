@extends('layouts.pageslayout')
@section('content')
<h1>sup wink</h1>
<form method = "POST" action="{{ route("logoutUser") }}">
  @csrf
  <button type = "submit" class = "btn btn-primary">Logout</button>
</form>
@endsection