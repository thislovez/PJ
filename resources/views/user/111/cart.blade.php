@extends('layouts/layoutsuser')

@section('title','Manage Sports Equipment')

@section('content')

<body>

หน้า cart
<h1>BORROW PAGE</h1>


	
<div class="container">
	<a class="btn btn-primary" href="{{url('user/cart')}}"><i class="fa fa-shopping-cart fa-fw w3-margin-right"></i>CART&nbsp;</a>
		<div class="table-responsive">          
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Pictures</th>
					<th>Name</th>	
					
				</tr>
			</thead>

			@foreach($objs as $row)
			<tbody>
				<tr>
					<td>{{$row->type_id}}{{$row->sp_id}}</td>
					<td><img class="img-responsive" src="{{asset($row->sp_img)}}" width="50" height="50"></td>
					<td>{{$row->sp_name}}<br>
						<I>{{$row->sp_brand}}</I>
					</td>
				

				 	<!-- <td>{{$row->created_at}}</td> -->
					<!-- <td>{{$row->updated_at}}</td> -->
					<td>
						<a class="fl btn btn-info btn-sm" id="cart" href="{{url('cart/'.$row->sp_id.'/cart') }}"><i class="fa fa-shopping-cart fa-fw w3-margin-right"></i>ADD CART&nbsp;</a>
						
						{{ csrf_field() }}
						
					</td>
				</tr>
			</tbody>
			@endforeach
		</table>
		</div>
</div>


@stop