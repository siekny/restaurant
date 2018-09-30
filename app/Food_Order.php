<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food_Order extends Model
{
	protected $fillable =[
		'cust_phone','cust_add','food_name','unit_price','qty','total','status'
	];
    protected $table = 'food_order';
}
