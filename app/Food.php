<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
	protected $fillable =[
		'name','description','price','cate_id'
	];
    protected $table = 'food';

    public function getCategory()
    {
        return $this->belongsTo("App\Category", "cate_id");
    }

}