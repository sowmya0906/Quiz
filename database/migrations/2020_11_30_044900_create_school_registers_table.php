<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_registers', function (Blueprint $table) {
            $table->id();
            $table->string('school_name');
            $table->string('coordinator');
            $table->string('email');
            $table->string('phone_number');
            $table->string('numberofteams');
            //$table->boolean('payment_done')->default('0');
            $table->boolean('is_paid')->default(false);
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
        Schema::dropIfExists('school_registers');
    }
}
