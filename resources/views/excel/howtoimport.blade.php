@extends('layouts/layoutsadmin')

@section('title','Import sport equipment')

@section('content')


<body>
<br><br>

<div class="container">

	<p>1. Download original form <a class="btn btn-info btn-xs" type="text/css" href="/sport.csv" > click here</a></p>
	<p>2. Fill up sports equipment :<br></p>
	<UL type = "square"> 
		 <LI>sp_name 	is the name of sport equipment.<br>
		 <LI>sp_type		is the type of sport equipment.<br>
		 <LI>type_id		is the ID of equipment.<br>
		 <LI>sp_brand 	is the brand of sport equipment.<br>
		 <LI>sp_price 	is the price of sport equipment.<br>
		 <LI>sp_img 		is the name of the image file. <br><br>
</UL> 
		<p><b>Example</b><br><br></p>

		<center><img src="/im.png" width="463"></center>





</form>
</div>

</div>
<br>
<br>
<br>
</body>

@stop