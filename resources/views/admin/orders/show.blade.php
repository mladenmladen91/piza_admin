@extends('layouts.admin')

@section('content')

<div class="row" style="margin-top: 80px;">
    <div class="col-12"><h1>Order- {{$order->id}}</h1></div>
    <table class="table table-striped" style="margin-top: 80px;">
    
    <thead>
      <tr>
        <th>Name</th>
        <th>Phone</th>
        <th>Adress</th>
        <th>City</th>
        <th>Email</th>
		<th>Total</th>
		<th>Delete</th>
	</tr>
    </thead>
    <tbody>
      <tr>
          <td>{{$order->name}}</td>
          <td>{{$order->phone}}</td>
		  <td>{{$order->address}}</td>	  
          <td>{{$order->email}}</td>
          <td>{{$order->total_price}}</td>
		  <td>
             <form method="post" action="{{route('order.destroy', $order->id)}}">
				@csrf
				<input type="hidden" name="_method" value="DELETE"> 
			    <button class="" type="submit">DELETE</button>
			 </form>   
          </td>      
          </tr>      
     </tbody>
  </table>

	 <table class="table table-striped" style="margin-top: 80px;">
    
    <thead>
      <tr>
        <th>Name</th>
        <th>Amount</th>
    </tr>
    </thead>
    <tbody>
	@foreach($order->pizzas as $pizza)	
      <tr>
          <td>{{$pizza->name}}</td>
          <td>{{$pizza->amount_order}}</td>
		</tr>
	@endforeach	
     </tbody>
  </table>
	
</div> 

 
@stop
@section('footer')

@stop