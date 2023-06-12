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
        Schema::create('session_info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id')->nullable();
            $table->unsignedBigInteger('client_id')->nullable();
            $table->foreign('employee_id')->references('id')->on('employee')->onDelete('set null')->onUpdate('cascade')->nullOnDelete();
            $table->foreign('client_id')->references('id')->on('client')->onDelete('set null')->onUpdate('cascade')->nullOnDelete();
            $table->string('note');
            $table->dateTime('appointment_date')->nullable();
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
        //
    }
};
