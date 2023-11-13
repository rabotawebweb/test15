<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Importusesr extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'first_name', 'last_name', 'email', 'age'
    ];
	
}
