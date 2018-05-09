@extends('layouts/layoutsuser')

@section('title','Home')

@section('content')


  <div class="w3-row-padding">



			@foreach($objs as $row)

    <div class="w3-third w3-container w3-margin-bottom"><br><br>

<img class="w3-hover-opacity" src="{{asset($row->n_img)}}" style="width:100%">

      <div class="w3-container w3-white"><br>
        <p><b>{{$row->n_title}}</b></p>
        <p>{{$row->n_content}}</p>
        <h6><p>{{$row->created_at}}</p></h6>
      </div>
    </div>


		
			@endforeach

</div>


<br>
<center>
    {{ $objs->render() }}
</center>
<br>
</body>
@stop