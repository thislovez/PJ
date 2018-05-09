@extends('layouts/layoutsuser')

@section('title','Manage Sports Equipment')

@section('content')

	<div class="col-md-8 col-md-offset-2">
		<h2>My Borrow</h2>
		@foreach($borrows as $borrow) 
			<div class="panel panel-default">
				<div class="panel-body">
					<ul class="list-group">
						
					</ul>
				</div>
				<div class="panel-footer">
				
					
				</div>
			</div>
		@endforeach
	</div>



@stop