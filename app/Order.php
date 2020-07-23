<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
     protected $fillable = ["name", "email", "phone", "address", "city"];
	
	public function pizzas(){
        return $this->belongsToMany("App\Pizza")->withPivot('amount_order');
    }
}
