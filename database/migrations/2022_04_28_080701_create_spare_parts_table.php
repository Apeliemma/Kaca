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
        Schema::create('spare_parts', function (Blueprint $table) {
            $table->id();
			$table->string('part_number');
			$table->string('serial_number')->nullable();
			$table->text('description')->nullable();
			$table->string('unit_of_account');
			$table->unsignedBigInteger('department_id')->nullable();
			$table->unsignedBigInteger('supplier_id')->nullable();
			$table->unsignedBigInteger('location_id')->nullable();
			$table->unsignedBigInteger('category_id')->nullable();
			$table->dateTime('warranty_date')->nullable();
			$table->dateTime('expiry_date')->nullable();
			$table->integer('reorder_level')->nullable();
			$table->string('remarks')->nullable();
			$table->integer('control_level');
			$table->double('quantity')->default(0);
			$table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('spare_parts');
    }
};
