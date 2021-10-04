<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadFollowUpEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lead_follow_up_entries', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('enquirer_id')->unsigned();
            $table->date('call_date');
            $table->string('call_time');
            $table->string('call_status');
            $table->text('remarks')->nullable();
            $table->timestamps();


            $table->foreign('enquirer_id')->references('id')->on('course_enquiries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lead_follow_up_entries');
    }
}
