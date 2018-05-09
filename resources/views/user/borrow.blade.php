@extends('layouts/layoutsuser')

@section('title','Borrow')

@section('content')

<br><br>
<body>




	
<div class="container">	


	
	<!-- <a class="btn btn-primary" href="{{url('user/borrow/sport-cart')}}">
		<i class="fa fa-shopping-cart fa-fw w3-margin-right"></i>CART&nbsp;
		<span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}
		</span>
			
	</a> -->




	
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
				
<!-- {{url('admin/sport/'.$row->sp_id.'/edit') }} -->

				 	<!-- <td>{{$row->created_at}}</td> -->
					<!-- <td>{{$row->updated_at}}</td> -->
					<td>
						<a class="fl btn btn-success btn-sm" href="{{ route('user.addToCart', ['sp_id' => $row->sp_id]) }}"><i class="fa fa-check-square"></i> &nbsp; BORROW &nbsp;</a>
						
						{{ csrf_field() }}
						
					</td>
				</tr>
			</tbody>
			@endforeach
		</table>
		</div>
</div>
<center>
    {{ $objs->render() }}
</center>

@stop