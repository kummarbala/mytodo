<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    //
	protected $primaryKey = 'id';
	 protected $fillable = ['id','title','completed', 'created_at', 'updated_at'];
}
