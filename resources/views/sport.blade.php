@extends('layouts/layoutsadmin')

@section('title','Manage Sports Equipment')

@section('content')



<div class="container">
  <div class='row'>

<form action="{{ $url }}" method="POST" enctype="multipart/form-data" >

  {{ method_field($method) }}

  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">


  <div class="form-group">
    <label for="sp_name">Name</label>
    <input type="text" class="form-control" name="name" placeholder="Name" value="{{$obj->sp_name or ''}}">
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



@stop