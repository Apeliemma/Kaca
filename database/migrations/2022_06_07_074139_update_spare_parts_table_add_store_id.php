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
        Schema::table('spare_parts', function (Blueprint $table) {
            $table->unsignedBigInteger('store_id');// A spare part must belong to a store

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('spare_parts', function (Blueprint $table) {
            $table->dropColumn('store_id');
        });
    }
};
