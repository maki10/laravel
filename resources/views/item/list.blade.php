@extends('default.master')

@section('header')
<script language="javascript">
function SelectRedirect(section){

switch(document.getElementById('sl1').value)
{
default:
window.location="/items/"+section;
break;
}
}
function Go_error(){
alert('Please add any item before proceeding to the Cart.');
}
</script>
@stop

@section('content')
@include('navigation')
<div class="container">
  <h2 class="pull-left">Items:</h2>
  
  <div class="form-group col-xs-2 pull-right">
  <label>Display only:
  <form onsubmit="return mysubmit();"> 
	<select name="section" class="form-control" id="sl1" onChange="SelectRedirect(section.value)">
			<option value="">~~~Select~~~</option>
			<option value="">All</option>
		@foreach($drops as $drop)
			<option value="{{$drop['type']}}">{{$drop['type']}}</option>
		@endforeach
	</select>
	</form>
	</label>
   </div>     
  <h2 class="text-center pull-right">Money: {{$money}}</h2>   
  <table class="table table-hover table-bordered text-center">
    <thead>
      <tr>
        <th class="text-center">Item name</th>
        <th class="text-center">Price</th>
        <th class="text-center">Type</th>
        <th class="text-center">Weight</th>
        <th class="text-center">Add</th>
      </tr>
    </thead>
    <tbody>
		@foreach($items as $item)
			<tr>
				<td>{{$item['name']}}</td>
				<td>{{$item['price']}}</td>
				<td>{{$item['type']}}</td>
				<td>{{$item['weight']}}</td>
				<td><a href="/basket/add/{{$item['id']}}"> + </a></td>
			</tr>
		@endforeach
	 </tbody>
	</table>
</div>
<div class="container text-right">
@if(count($basket)>=1)
<a href="/card"><button class=\"btn btn-default\">Go to Card</button></a>
@else
<button onclick='Go_error()' class=\"btn btn-default\">Go to Card</button>
@endif
</div>
@stop