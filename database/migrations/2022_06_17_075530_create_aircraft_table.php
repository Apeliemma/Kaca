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
        Schema::create('aircraft', function (Blueprint $table) {
            $table->id();
			$table->unsignedBigInteger('property_model_id');
            $table->unsignedBigInteger('user_id');
            $table->string('tail_number');
            $table->string('model')->nullable();
			$table->string('serial_number')->nullable();
			$table->string('engine_model')->nullable();
			$table->unsignedTinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aircraft');
    }
};
