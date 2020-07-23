@extends('layouts.admin')

@section('content')

<table class="table table-striped" style="margin-top: 80px;">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Edit</th>
        <th>Delete</th>
		<th><a href="{{route('users.create')}}">ADD USER +</a></th>  
      </tr>
    </thead>
    <tbody>
      @if($users) 
        @foreach($users as $user)
          <tr>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>
          <td><a href="{{ route('users.edit', $user->id) }}">EDIT</a></td>
          <td>
			 <form method="post" action="{{route('users.destroy', $user->id)}}">
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
