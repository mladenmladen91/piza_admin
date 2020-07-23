<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    protected $fillable = [
        'name', 'amount', 'price', 'avatar', 'ingredients'
    ];
	
	public function orders(){
        return $this->belongsToMany("App\Order");
    }
}
