@extends('default.master')

@section('content')
    <div class="container">
	<div class="col-md-4 col-md-offset-4">
      <form class="form-signin" method="post" action="">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="mail" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="pass" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->
    </div> <!-- /container -->
@endsection