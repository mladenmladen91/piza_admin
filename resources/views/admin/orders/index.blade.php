@extends('layouts.admin')

@section('content')


<table class="table table-striped" style="margin-top: 80px;">
    
    <thead>
      <tr>
        <th>Name</th>
        <th>Phone</th>
        <th>Adress</th>
        <th>City</th>
        <th>Email</th>
		<th>Total</th>
		<th></th>  
        <th>Delete</th>
	</tr>
    </thead>
    <tbody>
      @if($orders) 
        @foreach($orders as $order)
          <tr>
          <td>{{$order->name}}</td>
          <td>{{$order->phone}}</td>
		  <td>{{$order->address}}</td>	  
          <td>{{$order->email}}</td>
          <td>{{$order->total_price}}</td>
		  <td><a href="{{route('order.show',$order->id)}}">View</a></td>	  
          <td>
             <form method="post" action="{{route('order.destroy', $order->id)}}">
				@csrf
				<input type="hidden" name="_method" value="DELETE"> 
			    <button class="" type="submit">DELETE</button>
			 </form>   
          </td>      
          </tr>      
        @endforeach
      @endif    
      
     
    </tbody>
  </table>
   
  
@stop
@section('footer')
 
@stop