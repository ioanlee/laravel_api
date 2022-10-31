<?php

namespace App\Http\Controllers;

use App\Models\User;

/**
 * 	@OA\Get(
 *   		path="/api/v1/users",
 * 		summary="Fetch all users",
 *   		@OA\Response(
 * 			response=200, 
 * 			description=""
 * 		)
 * )
 */

class UserController extends Controller
{
   function get() 
	{
		return User::all();
	}

	public function driver() 
	{
		return $this->belongsTo(User::class);
	}
}
