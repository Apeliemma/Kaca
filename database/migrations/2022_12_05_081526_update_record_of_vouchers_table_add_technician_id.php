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
        Schema::table('record_of_vouchers', function (Blueprint $table) {
            $table->unsignedBigInteger('technician_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('record_of_vouchers', function (Blueprint $table) {
            $table->dropColumn('technician_id');
        });
    }
};
