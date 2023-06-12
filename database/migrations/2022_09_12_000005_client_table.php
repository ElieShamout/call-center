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
        Schema::create('client', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('center_name');
            $table->string('last_name');
            $table->string('city');
            $table->string('street');
            $table->unsignedBigInteger('phone_id')->nullable();
            $table->foreign('phone_id')->references('id')->on('employee_phones')->onDelete('set null')->onUpdate('cascade')->nullOnDelete();
            $table->string('work');
            $table->string('id_number');
            $table->string('email')->nullable();
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
