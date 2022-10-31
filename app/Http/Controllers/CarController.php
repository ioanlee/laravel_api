<?php

namespace App\Http\Controllers;

use App\Models\Car;

/**
 * 	@OA\Get(
 *   		path="/api/v1/cars",
 * 		summary="Fetch all cars",
 *   		@OA\Response(
 * 			response=200, 
 * 			description=""
 * 		)
 * 	)
 */

class CarController extends Controller
{
   function get() 
	{
		return Car::all();
	}

	public function driver() 
	{
		return $this->belongsTo(User::class);
	}
}
