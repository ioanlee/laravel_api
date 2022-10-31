<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
				$table->unsignedInteger('user_id');
				$table->unsignedInteger('car_id');
				
				$table->foreign('user_id')
					->references('id')
					->on('users')
					->onDelete('cascade');
				$table->foreign('car_id')
					->references('id')
					->on('cars')
					->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drivers');
    }
};
