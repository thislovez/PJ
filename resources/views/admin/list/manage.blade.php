@extends('layouts/layoutsadmin')

@section('title','Manage Form')

@section('content')


<br><br>
<body>


	
<div class="container">


	<a class="btn btn-primary" href="{{url('admin/sport/create')}}"><i class="fa fa-paint-brush"> </i> Create </a>
	<a class="btn btn-primary" href="{{url('admin/sport/getImport')}}" >  <i class="fa fa-external-link"> </i>  Import </a>


	<div class="btn-group">
		<button type="button" class="btn btn-primary"> <i class="fa fa-download"> </i> Export</button>
		<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">  
			<span class="caret"></span>
			<span class="sr-only">Toggle Dropdown</span>
		</button>
		<ul class="dropdown-menu" role="menu" id="export-menu">
			<li id="export-to-excel"><a href="{{url('admin/sport/getExport')}}"> Export To Excel</a></li>
			<li class="divider"></li>
			<li><a href="#">Other</a></li>
		</ul>
	</div>

<br><br>

<div class="form-group">
<input type="text" class="form-control" id="search" name="search"></input>
</div>

	<br>
		<div class="table-responsive">          
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Pictures</th>
					<th>Name</th>	
					<th>Type</th>		
					<th>Brand</th>
					<th>Price</th>	
					<th>STATUS</th>			
					<!-- <th>Create</th> -->
					<!-- <th>Update</th> -->
				</tr>
			</thead>
<tbody>
			@foreach($objs as $row)
			
				<tr>
					<td>{{$row->type_id}}{{$row->sp_id}}</td>
					<td><img class="img-responsive" src="{{asset($row->sp_img)}}" width="50" height="50"></td>
					<td>{{$row->sp_name}}</td>
					<td>{{$row->sp_type}}</td>
					<td>{{$row->sp_brand}}</td>
					<td>{{$row->sp_price}}</td>
					<td>{{$row->sp_status}}</td>
				 	<!-- <td>{{$row->created_at}}</td> -->
					<!-- <td>{{$row->updated_at}}</td> -->
					<td>

						
						
						
						@if($row->sp_status == 'ready')
						<a class="fl btn btn-success" id="express" href="{{url('admin/sport/'.$row->sp_id.'/express') }}"><i class="fa fa-check-square"></i></a>
	
						@endif
						
						<a class="fl btn btn-primary" id="edit" href="{{url('admin/sport/'.$row->sp_id.'/edit') }}"><i class="fa fa-pencil-square-o "></i></a>
						<form action="{{url('admin/sport/'.$row->sp_id) }}" method="post" onsubmit="return(confirm('Do you want to delete ?'))">
						{{ method_field('DELETE') }}
						{{ csrf_field() }}

						<button type="submit" class="btn btn-danger"><i class="fa fa-trash">  </i></button>
						</form>
						
						
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

					</td>
				</tr>
			
			@endforeach
</tbody>

			
		</table>


    


		</div>

<h6 class="w3-text-grey"> Total all sports equipment : {{$objs->count()}}/{{ $objs->total() }} </h6>
 <center>

    {{ $objs->render()  }}

</center>

</div>


<script type="text/javascript">
	$('#search').on('keyup',function(){
		$value=$(this).val();
		$.ajax({
			type : 'get',
			url : '{{URL::to('admin/search')}}',
			data : {'search':$value},
			success:function(data){
				$('tbody').html(data);
			}
		})
	})



</script>

</body>
@stop