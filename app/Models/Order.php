<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'adress',
        'email',
        'date',
        'service',
        'description',
        'file_path',
        'file_original_name',
    ];
}
