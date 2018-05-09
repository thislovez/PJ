@extends('layouts/layoutsuser')

@section('title','Edit Profile')

@section('content')

<br>

<div class="container">
  <div class='row'>

<form method="POST" enctype="multipart/form-data" >


  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">


  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" placeholder="Please enter" value="{{$obj->name or ''}}">
  </div>




  <div class="form-group">
    <label for="password">Password</label>
    <input type="text" class="form-control" name="password" placeholder="Please enter" value="{{''}}">
  </div>


  <div class="form-group">
    <label for="conpassword">Confirm Password</label>
    <input type="text" class="form-control" name="conpassword" placeholder="Please enter" value="{{''}}">
  </div>


  <div class="form-group">
    <label for="tel">Phone Number</label>
    <input type="text" class="form-control" name="tel" placeholder="Please enter" value="{{$obj->tel or ''}}">
  </div>




  <div class="form-group">
    <label for="us_img">Image</label>
    <input type="file"  name="image"  value="{{$obj->us_img or ''}}">

  </div>  




  <button type="submit" class="btn btn-primary">Submit</button>
</form>

  </div>
</div>


<br>


<br>
@stop