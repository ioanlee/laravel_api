<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
	use HasFactory;

	public function car() 
	{
		return $this->hasOne(Car::class);
	}

	public function user() 
	{
		return $this->hasOne(User::class);
	}
}
