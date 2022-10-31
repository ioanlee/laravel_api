<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Driver;
use Illuminate\Http\Response;

class ApiTest extends TestCase
{
	public function test_get_users()
	{		
		$this->json('get', 'api/v1/users')
			->assertStatus(Response::HTTP_OK)
			->assertJsonStructure([
				"data" => [
					"*" => [
						"id",
						"name",
						"created_at",
						"updated_at",
					]
				]
			]);
	}

	public function test_get_cars() 
	{		
		$this->json('get', 'api/v1/cars')
			->assertStatus(Response::HTTP_OK)
			->assertJsonStructure([
				"data" => [
					"*" => [
						"id",
						"name",
						"created_at",
						"updated_at",
					]
				]
			]);
	}

	public function test_get_drivers() 
	{		
		$this->json('get', 'api/v1/drivers')
			->assertStatus(Response::HTTP_OK)
			->assertJsonStructure([
				"data" => [
					"*" => [
						"id",
						"created_at",
						"updated_at",
						"user_id",
						"car_id",
					]
				]
			]);
	}

	public function test_set_driver() 
	{
		$payload = [
			'user_id' => $this->faker->seed,
			'car_id'  => $this->faker->seed,
	  	];

		$this->json('post', 'api/v1/drivers', $payload)
			->assertStatus(Response::HTTP_OK)
			->assertJsonStructure([
				"data" => [
					"*" => [
						"id",
						"created_at",
						"updated_at",
						"user_id",
						"car_id",
					]
				]
			]);
	}

	public function test_delete_driver() 
	{
		$driver = Driver::create(
			[
				'id' => $this->faker->seed(),
				'car_id' => $this->faker->seed(),
				'user_id' => $this->faker->seed(),
			]
		);

		$this->json('post', "api/v1/drivers/$driver->id")
			->assertStatus(Response::HTTP_OK)
			->assertJsonStructure([
				"data" => [
					"deleted" => [
						"id",
						"created_at",
						"updated_at",
						"user_id",
						"car_id",
					]
				]
			]);
	}
}