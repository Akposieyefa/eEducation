<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->uuid('user_id');
            $table->string('student_id')->unique();
            $table->string('fname');
            $table->string('mname');
            $table->string('lname');
            $table->date('dob');
            $table->string('gender');
            $table->string('nationality');
            $table->string('address');
            $table->bigInteger('state_id')->unsigned();
            $table->bigInteger('lga_id')->unsigned();
            $table->bigInteger('level_id')->unsigned();
            $table->bigInteger('arm_id')->unsigned();
            $table->bigInteger('guardian_id')->unsigned()->nullable();
            $table->binary('passport');

            $table->foreign('state_id')->references('id')->on('states');
            $table->foreign('lga_id')->references('id')->on('lgas');
            $table->foreign('level_id')->references('id')->on('levels');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('arm_id')->references('id')->on('arms');
            $table->foreign('guardian_id')->references('id')->on('guardians');
            $table->date('addmited_date');
            $table->softDeletes();
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
        Schema::dropIfExists('students');
    }
}
