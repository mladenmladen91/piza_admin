@extends('layouts.admin')
@section('content')
<div class="row" style="margin-top: 80px;">
    <div class="col-12"><h1>Edit user</h1></div>
    <div class="col-sm-9">
	<form action="{{route('users.update',$user->id)}}" method="post">
	 @csrf
	    <input type="hidden" name="_method" value="PUT" />
	    <input type="text" name="name" placeholder="Name" value="{{$user->name}}" required />
		<input type="email" name="email" placeholder="Email"  value="{{$user->email}}" required/>
		<input type="password" name="password" placeholder="Password" />
		<button type="submit">EDIT</button>
	</form>	
    </div>
</div>    
 <div class="row">
  <div class="col-xs-12">     
   @include('includes.error')
  </div>      
</div>
@stop

@section('footer')
   
@stop