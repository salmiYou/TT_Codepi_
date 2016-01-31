@extends('layouts.app')
@section('content')
<div class="panel panel-default">
  <div class="panel-body">
    <center>
<form class="form-inline" method="POST">
   {{ csrf_field() }}

    <div class="form-group">
        <label class="sr-only" for="inputEmail">Email</label>
        <input name="email" type="email" class="form-control" id="inputEmail" placeholder="Email">
    </div>

    <div class="form-group">
        <label class="sr-only" for="inputPassword">Password</label>
        <input name="password" type="password" class="form-control" id="inputPassword" placeholder="Password">
    </div>

    <button type="submit" class="btn btn-primary">Login</button>
</form>
</center>
</div>
</div>
@endsection
