@extends('layouts.guest')

<div class="container">

  <form class="form-signin" method="POST">
    <h2 class="form-signin-heading"><img src="{{ url('images/one-blood-logo.jpg') }}" class="img-responsive" /></h2>

  	@include('layouts.partials.messages')

    <label for="username" class="sr-only">Username</label>
    <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
    <label for="password" class="sr-only">Password</label>
    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
  </form>

</div>