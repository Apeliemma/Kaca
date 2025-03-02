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
        Schema::table('stocks', function (Blueprint $table) {
            $table->unsignedBigInteger('aircraft_id')->nullable(); // Aircraft Model i.e MD 530F - Tail 545
            $table->unsignedBigInteger('user_id')->nullable(); // user who actioned the process
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stocks', function (Blueprint $table) {
            $table->dropColumn('aircraft_id');
            $table->dropColumn('user_id');
        });
    }
};
