@extends('default.master')

@section('content')
@include('navigation')
<div class="container">
  <h2 class="text-center pull-right">Money:{{$money}}</h2>   
  <table class="table table-hover table-bordered text-center">
    <thead>
      <tr>
        <th class="text-center">Item name</th>
        <th class="text-center">Price</th>
        <th class="text-center">Number of item</th>
        <th class="text-center">Remove</th>
      </tr>
    </thead>
    <tbody>
	@foreach($basket as $card)
		<tr>
			<td>{{$card['name']}}</td>
			<td>{{$card['price']}}</td>
			<td>{{$card['kol']}}</td>
			<td><a href="/basket/delete/{{$card['id']}}"> - </a></td>
		</tr>
	@endforeach
	</tbody>
	</table>
	<div class="col-md-2 col-md-offset-10 text-right">
	<p >Shiping price:{{$ship}}</p>
	<p >Total price:{{$price}}</p>
	<hr>
	 <a href="card/cash_out"><button class="btn btn-info pull-right">Buy items</button></a>
    </div>
</div>
@stop