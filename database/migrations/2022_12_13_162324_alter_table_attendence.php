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
       
        Schema::table('attendence',function (Blueprint $table){
            $table->foreign('student_id')->references('id')->on('student')->onDelete('cascade');
            $table->foreign('class_type_id')->references('id')->on('class_type')->onDelete('cascade');
            $table->foreign('year_id')->references('id')->on('year');
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
