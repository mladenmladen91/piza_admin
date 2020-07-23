@extends('layouts.admin')

@section('content')

<div class="row" style="margin-top: 80px;">
    <div class="col-12"><h1>Create user</h1></div>
    <div class="col-sm-9">
	<form action="{{route('users.store')}}" method="post">
	 @csrf
	    <input type="text" name="name" placeholder="Name"  required />
		<input type="email" name="email" placeholder="Email"   required/>
		<input type="password" name="password" placeholder="Password" />
		<button type="submit">CREATE</button>
	</form>	
    </div>
</div> 

@include('includes.error')
 
@stop
@section('footer')

@stop