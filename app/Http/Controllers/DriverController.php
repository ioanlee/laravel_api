<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\User;
use App\Models\Car;

class DriverController extends Controller
{
	/**
	 * 	@OA\Get(
 	 *   		path="/api/v1/drivers",
    * 		summary="Fetch all user-to-car relations",
 	 *   		@OA\Response(response=200, description=""),
 	 * 	)
	 */
   function get() 
	{
		return Driver::all();
	}

	/**
	 * 	@OA\Post(
 	 *   		path="/api/v1/drivers",
 	 * 		summary="Create new user-to-car relation by their ids",
 	 *	  		@OA\Parameter(
 	 *				name="user_id",
 	 *				in="query",
 	 * 			@OA\Schema(type="integer"),
 	 *   		),	
 	 *	  		@OA\Parameter(
 	 *				name="car_id",
 	 *				in="query",
 	 * 			@OA\Schema(type="integer"),
 	 *   		),	
	 *			@OA\RequestBody(
	 *				@OA\MediaType(
	 *					mediaType="application/json",
	 *					@OA\Schema(		
	 *						@OA\Property(property="user_id", type="number", example="1"),
	 *						@OA\Property(property="car_id", type="number", example="1"),
	 *					),
	 *				),
	 *			),
 	 *   		@OA\Response(response=200, description=""),
 	 * 	)
	 */
	function set()
	{
		request()->validate([
			'user_id' => 'required|unique:drivers,user_id',
			'car_id' => 'required|unique:drivers,car_id',
		]);
		
		$driver = new Driver();
		$driver->user_id = request('user_id');
		$driver->car_id = request('car_id');
		$driver->save();

		return Driver::find($driver->id);
	}

	/**
	 * 	@OA\Delete(
 	 *   		path="/api/v1/drivers/{id}",
 	 * 		summary="Delete user-to-car relation by id",
 	 *   		@OA\Response(response=200, description=""),
 	 * 	)
	 */
	function delete($id) 
	{
		$entry = Driver::find($id);
		if($entry->delete()) return ['deleted' => $entry];
	}

	public function car() 
	{
		return $this->hasOne(Car::class);
	}
	
	public function user() 
	{
		return $this->hasOne(User::class);
	}
}
