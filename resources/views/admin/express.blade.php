@extends('layouts/layoutsadmin')

@section('title','Borrow Express')

@section('content')


<div class="container">
  <div class='row'>

<form action="{{ route('admin.sport.express_sp', $data->sp_id ) }}" enctype="multipart/form-data" >

  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">



<br><br>

  <div class="form-group">
    
     <div class="form-group">
    <label for="us_id">STUDENT ID</label>
    <input type="text" class="form-control" name="us_id" placeholder="Please Enter">
  </div>


  </div>


  	<div class="form-group">
    <label for="sp_id">SPORT ID</label>
    <input type="text" class="form-control" name="sp_id" placeholder="Please Enter" value="{{$data->sp_id or ''}}">
  </div>



    <!-- <button type="reset" class="btn btn-danger">Reset</button> -->

    <button type="submit" class="btn btn-primary btn-sm">Submit</button>

</form>

  </div>
</div>


<br>



@stop