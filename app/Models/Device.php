<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Device extends Model
{

    use SoftDeletes;
	
	protected $table = 'devices';
	
	protected $hidden = [        
    ];

	protected $guarded = [];

	protected $dates = ['deleted_at']; 

}

