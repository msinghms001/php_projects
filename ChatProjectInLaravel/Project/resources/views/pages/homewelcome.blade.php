@extends('pages/welcome')

@section('style')
<style type="text/css">
body{
  background-image:url("{{asset('bg/img.jpg')}}");
}
</style>
@endsection

@section('content')
<div class="container text-center well " >
Welcome to Chat Room
<div class="jumbotron">
@if(session('msg'))
<span class="alert alert-danger">{{session('msg')}}</span>
@endif
	<form method="post" class="form-horizontal" action="chat">

    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" value="ms@gmail.com" class="form-control" id="email" placeholder="Enter email" name="email">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="password">Password:</label>
      <div class="col-sm-10">   
      <input type="hidden" name="_token" value="{{csrf_token()}}">       
        <input type="password" value="123456" class="form-control" id="pwd" placeholder="Enter password" name="password">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label><input type="checkbox" name="remember"> Remember me</label>
        </div>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button><br>
        <a href="register" class="btn btn-md btn-info">Register</a>
      </div>

    </div>
  </form>
</div>
</div>

@endsection
