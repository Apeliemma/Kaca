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
        Schema::create('store_parts', function (Blueprint $table) {
            $table->id();
			$table->unsignedBigInteger('spare_part_id');
			$table->unsignedBigInteger('store_id');
            $table->double('quantity')->default(0);
            $table->double('svc_quantity')->default(0);
			$table->double('unsvc_quantity')->default(0);
			$table->integer('location_id')->nullable();
			$table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('store_parts');
    }
};
