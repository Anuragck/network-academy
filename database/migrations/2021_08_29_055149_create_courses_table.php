<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            // $table->bigInteger('course_category_id')->unsigned();
            $table->string('course_name');
            $table->string('course_short_name');
            $table->string('course_code');
            $table->text('small_description');
            $table->text('course_description');
            $table->string('course_duration');
            $table->string('course_duration_type')->nullable();
            $table->integer('course_fee');
            $table->integer('course_certification_fee');
            $table->string('course_certification_code');
            $table->string('course_image');
            $table->string('course_syllabus')->nullable();
            $table->string('add_to_home_status')->default('0');
            $table->timestamps();

            // $table->foreign('course_category_id')->references('id')->on('course_categories')->onDelete('cascade');
        });




    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
