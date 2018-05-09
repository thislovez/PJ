@extends('layouts/layoutsadmin')

@section('title','Create News')

@section('content')


<br><br>
<div class="container">
  <div class='row'>

<form action="{{ $url }}" method="POST" enctype="multipart/form-data" >

  {{ method_field($method) }}

  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">


  <div class="form-group">
    <label for="n_title">Title</label>
    <input type="text" class="form-control" name="title" placeholder="Please enter a title" value="{{$obj->n_title or ''}}">
  </div>




  <div class="form-group">
    <label for="n_content">Content</label>
    <textarea class="form-control" name="content" placeholder="Please enter the content" value="{{$obj->n_content or ''}}" rows="3"></textarea>
  </div>




  <div class="form-group">
    <label for="n_img">Image</label>
    <input type="file"  name="image"  value="{{$obj->n_img or ''}}">

  </div>  




  <button type="submit" class="btn btn-primary">Submit</button>
</form>

  </div>
</div>


<br>



@stop