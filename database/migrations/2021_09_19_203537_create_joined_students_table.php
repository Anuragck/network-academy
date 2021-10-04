<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJoinedStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('joined_students', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('enquired_id')->unsigned();
            $table->string('student_name');
            $table->string('student_email');
            $table->string('student_mobile');
            $table->string('student_dob');
            $table->string('student_district');
            $table->string('student_state');
            $table->string('student_street');
            $table->string('student_pin');
            $table->string('student_education');
            $table->string('joined_course');
            $table->string('joined_batch');
            $table->string('joined_course_fee')->nullable();
            $table->string('course_fee_recieved')->default('0');
            $table->string('joined_date');
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
        Schema::dropIfExists('joined_students');
    }
}
