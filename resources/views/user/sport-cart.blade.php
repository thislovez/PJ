@extends('layouts/layoutsuser')

@section('title','Cart')

@section('content')
<br><br>
	@if (Session::has('cart'))




		<div class="row">
			<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
				<ul class="list-group">
					@foreach($objs as $obj)
						<li class="list-group-item">
							<span class="badge">{{$obj['qty'] }}</span>
								

							<strong>
								ID {{$obj['item']['type_id']}}{{$obj['item']['sp_id']}} : {{$obj['item']['sp_name']}}
								<br>
								<img class="img-responsive" src="{{asset($obj['item']['sp_img'])}}" width="50" height="50">
								<p align = right>
									<a class="btn btn-danger btn-sm" 
									href="{{ route('user.remove', ['sp_id' => $obj['item']['sp_id']]) }}">DELETE ITEM</a>
								</p>
									
						</strong>
						
								
								

					@endforeach
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
				<strong>Total : {{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</strong>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
				<a href="{{route('user.CheckOut')}}" type="button" class="btn btn-success">CHECKOUT</a>
			</div>
		</div>
		

	@else
		<div class="row">
			<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
				<h2>No Item in Cart!</h2>
			</div>
		</div>
	@endif
<br><br>
@stop