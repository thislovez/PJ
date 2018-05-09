@extends('layouts/layoutsadmin')

@section('title','Manage Borrow')

@section('content')


<br><br>
<body>
	
<div class="container">
		<div class="table-responsive">          
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Pictures</th>
					<th>STUDENT ID</th>
					<th>DATE OF BORROW</th>	
					<th>DATE OF RETURN</th>		
					<th>FINE</th>		
			
					<!-- <th>Create</th> -->
					<!-- <th>Update</th> -->
				</tr>
			</thead>

			@foreach($objs as $row)
			
			@if($row->sport->sp_status == 'borrow')

				
			<tbody>
				<tr>
					<td>{{$row->sport->type_id}}{{$row->sp_id}}</td>
					<td><img class="img-responsive" src="{{asset($row->sport->sp_img)}}" width="50" height="50"></td>
					
					<td>{{$row->us_id}}</td>
					<td>{{$row->br_date}}</td>
					<td>{{$row->br_return}}</td>
					<td>{{ (( (strtotime($row->br_return) - strtotime($row->br_date))/ (60*60*24) )*20)-20  }}</td>

				 	<!-- <td>{{$row->created_at}}</td> -->
					<!-- <td>{{$row->updated_at}}</td> -->
					<td>

					@if ($row->br_ever_return == 0)
						<form action="{{ url('admin/report/'.$row->sp_id.'/return')}}" enctype="multipart/form-data" >


						<button type="submit" class="btn btn-warning btn-sm">RETURN</button>

						</form>
					@endif



					</td>
				</tr>
			</tbody>
			@endif
			@endforeach



			
		</table>
		</div>
</div>

<center>

	
    			{{ $objs->render() }}

</center>


</body>
@stop