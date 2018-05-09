@extends('layouts/layoutsadmin')

@section('title','Manage Sports Equipment')

@section('content')

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<br><br>
<div class="container">
  <div class='row'>

<form action="{{ $url }}" method="POST" enctype="multipart/form-data" >

  {{ method_field($method) }}

  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">


  <div class="form-group">
    <label for="sp_name">Name</label>

<select class="js-example-basic-single form-control"  name="name" value="{{$obj->sp_name or ''}}">
  <option value="">Please Select</option>
  <option value="ลูกบาสเกตบอล">ลูกบาสเกตบอล</option>
<option value="ลูกฟุตบอล">ลูกฟุตบอล</option>
<option value="ลูกฟุตซอล">ลูกฟุตซอล</option>
<option value="ลูกเทนนิส">ลูกเทนนิส</option>
<option value="ลูกวอลเลย์บอล">ลูกวอลเลย์บอล</option>
<option value="ลูกแบดมินตัน">ลูกแบดมินตัน</option>
<option value="ไม้เทนนิส">ไม้เทนนิส</option>
<option value="ไม้แบดมินตัน">ไม้แบดมินตัน</option>
<option value="Basketball">Basketball</option>
<option value="Football">Football</option>
<option value="Futsal ball">Futsal ball</option>
<option value="Tennis ball">Tennis ball</option>
<option value="Volleyball">Volleyball</option>
<option value="Badminton">Badminton</option>
<option value="Tennis racket">Tennis racket</option>
<option value="Badminton racquet">Badminton racquet</option>
</select>


  </div>


  <div class="form-group">
    <label for="sp_type">Type</label>
    <select class="form-control css-require" name="type" placeholder="Type" value="{{$obj->sp_type or ''}}">

        <option value="">Please Select</option>
        <option value="Basketball">Basketball</option>
        <option value="Football">Football</option>
        <option value="Futsal">Futsal</option>
        <option value="Tennis">Tennis</option>
        <option value="Volleyball">Volleyball</option>
        <option value="Badminton">Badminton</option>
        

      </select>




  </div>


  <div class="form-group">
    <label for="sp_brand">Brand</label>
    <input type="text" class="form-control" name="brand" placeholder="Brand" value="{{$obj->sp_brand or ''}}">
  </div>



  <div class="form-group">
    <label for="sp_price">Price</label>
    <input type="text" class="form-control" name="price" placeholder="Price" value="{{$obj->sp_price or ''}}">
  </div>

  <!-- <div class="form-group">
    <label for="type_id">Type ID</label>
    <select class="form-control css-require" name="type_id" placeholder="Type_id" value="{{$obj->type_id or ''}}">
        <option value="">Please Select</option>
        <option value="BB">BB</option>
        <option value="FB">FB</option>
        <option value="FS">FS</option>
        <option value="TN">TN</option>
        <option value="VB">VB</option>
        <option value="BT">BT</option>
      </select>
  </div> -->





  <div class="form-group">
    <label for="sp_img">Image</label>
    <input type="file"  name="image"  value="{{$obj->sp_img or ''}}">

  </div>  




  <button type="submit" class="btn btn-primary">Submit</button>
</form>

  </div>
</div>


<br>

<script>
  
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});



</script>



@stop