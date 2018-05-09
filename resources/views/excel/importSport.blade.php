@extends('layouts/layoutsadmin')

@section('title','Import sport equipment')

@section('content')


<body>
<br><br>

<div class="container">

	<div class="form-group">
<form class="form-control-file" action="postImport" method="post" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{{csrf_token()}}">
	<input type="file" name="sport">
	<br>
	<input class="btn btn-primary" type="submit" value="Import"></input>

	<a class="btn btn-warning" href="/admin/howtoimport">How to import</a>


</form>
</div>

</div>
<br>
<br>
</body>

@stop