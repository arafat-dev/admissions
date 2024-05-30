<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table = 'category_record';

    protected $fillable = [
        'name'
    ];
}
