<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lends', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->date('date_from');
            $table->date('date_to');
            $table->boolean('returned')->default(0);
            $table->date('date_returned')->nullable();
            $table->smallInteger('fine')->nullable();
            $table->string('additional_info', 1000)->nullable()->default('-');
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('students')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lends');
    }
}
