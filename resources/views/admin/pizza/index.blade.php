@extends('layouts.admin')

@section('content')


<table class="table table-striped" style="margin-top: 80px;">
    
    <thead>
      <tr>
        <th>Name</th>
        <th>Amount</th>
        <th>Price</th>
        <th>Image</th>
        <th>Edit</th>
        <th>Delete</th>
		<th><a href="{{route('pizza.create')}}">ADD PIZZA +</a></th>   
      </tr>
    </thead>
    <tbody>
      @if($pizzas) 
        @foreach($pizzas as $pizza)
          <tr>
          <td>{{$pizza->name}}</td>
          <td>{{$pizza->amount}}</td>
		  <td>{{$pizza->price}}€</td>	  
          <td><img src="../images/{{$pizza->avatar}}" height="50" width="50"></td>
          <td><a href="{{ route('pizza.edit', $pizza->id) }}">EDIT</a></td>
          <td>
             <form method="post" action="{{route('pizza.destroy', $pizza->id)}}">
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