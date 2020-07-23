@extends('layouts.admin')
@section('content')
@include('includes.tiny')
<div class="row" style="margin-top: 80px;">
    <div class="col-12"><h1>Create pizza</h1></div>
    <div class="col-sm-9">
	<form action="{{route('pizza.store')}}" method="post" enctype="multipart/form-data">
	 @csrf
		<div class="form-group">
	    <input type="text" name="name" placeholder="Name"  required />
		</div>
		<div class="form-group">
		<input type="number" name="amount" placeholder="Amount"   required/>
		</div>
		<div class="form-group">
		<input type="price" name="price" placeholder="Price" required />
		</div>
		<div class="form-group">
		Image:<input type="file" name="avatar"/>
		</div>
		<div class="form-group">
		<textarea name="ingredients" placeholder="Ingredients"></textarea>
		</div>
		<div class="form-group">
		<button type="submit">CREATE</button>
		</div>	
	</form>	
    </div>
</div> 

@include('includes.error')
@stop