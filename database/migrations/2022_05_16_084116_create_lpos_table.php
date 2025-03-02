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
        Schema::create('lpos', function (Blueprint $table) {
            $table->id();
			$table->string('number');
			$table->double('quantity')->nullable();
			$table->unsignedBigInteger('supplier_id')->nullable();
			$table->dateTime('delivery_date')->nullable();
			$table->unsignedBigInteger('user_id');
			$table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('lpos');
    }
};
