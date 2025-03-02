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
            $table->double('svc_quantity')->default(0)->after('quantity'); // Servicable
            $table->double('unsvc_quantity')->default(0)->after('svc_quantity'); // Un serviceable
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
            $table->dropColumn('svc_quantity');
            $table->dropColumn('unsvc_quantity');
        });
    }
};
