@extends('layouts.admin')
@section('content')
@include('includes.tiny')
<div class="row" style="margin-top: 80px;">
    <div class="col-12"><h1>Edit pizza</h1></div>
    <div class="col-sm-9">
	<form action="{{route('pizza.update',$pizza->id)}}" method="post" enctype="multipart/form-data">
	 @csrf
		<input type="hidden" name="_method" value="PUT" />
		<div class="form-group">
	    <input type="text" name="name" placeholder="Name" value="{{$pizza->name}}"  required />
		</div>
		<div class="form-group">
		<input type="number" name="amount" placeholder="Amount" value="{{$pizza->amount}}"   required/>
		</div>
		<div class="form-group">
		<input type="price" name="price" placeholder="Price" value="{{$pizza->price}}" required />
		</div>
		<div class="form-group">
		<img src="{{URL::to('images/'.$pizza->avatar)}}" height="50" width="50">	
		Image:<input type="file" name="avatar"/>
		</div>
		<div class="form-group">
		<textarea name="ingredients">{{$pizza->ingredients}}</textarea>
		</div>
		<div class="form-group">
		<button type="submit">EDIT</button>
		</div>	
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