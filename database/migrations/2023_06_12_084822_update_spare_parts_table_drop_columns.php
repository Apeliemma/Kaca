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
            $table->dropColumn('store_id');
            $table->dropColumn('location_id');
            $table->dropColumn('supplier_id');
            $table->dropColumn('quantity');
            $table->dropColumn('svc_quantity');
            $table->dropColumn('unsvc_quantity');
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
            $table->unsignedBigInteger('store_id');// A spare part must belong to a store
            $table->unsignedBigInteger('location_id');
            $table->unsignedBigInteger('supplier_id');
            $table->double('quantity')->default(0);
            $table->double('svc_quantity')->default(0)->after('quantity'); // Servicable
            $table->double('unsvc_quantity')->default(0)->after('svc_quantity'); // Un serviceable
        });
    }
};
