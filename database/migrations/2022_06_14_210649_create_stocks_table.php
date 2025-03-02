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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
			$table->unsignedBigInteger('spare_part_id');
			$table->unsignedInteger('quantity')->default(0);
			$table->enum('entry_type',['IV','RV'])->default('RV');// IV for Issued, RV for Received
            $table->string('reference')->nullable();
            $table->string('reason')->nullable();
			$table->unsignedTinyInteger('issue_status')->default(0);
			$table->unsignedTinyInteger('receive_status')->default(0);
			$table->enum('issue_type',['NML','TL'])->default('NML'); // NML- Normal Issue, TL - Temporary Loan
			$table->string('voucher')->nullable();
			$table->enum('account_issued',['store','technician','supplier'])->default('store');
			$table->unsignedBigInteger('issued_by')->nullable();
			$table->unsignedInteger('issued_to')->nullable(); // can be user, supplier or store
			$table->dateTime('date')->nullable();// can act as the date it was received or issued
            $table->unsignedBigInteger('received_by')->nullable();
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
        Schema::dropIfExists('stocks');
    }
};
