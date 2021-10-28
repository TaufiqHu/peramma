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
            $table->string('name', 200);
            $table->string('nis', 50)->unique();
            $table->unsignedSmallInteger('class_room_id');
            $table->string('photo', 250)->nullable()->default(null);
            $table->string('address', 1000)->nullable()->nullable();
            $table->string('gender', '6')->default('male');
            $table->string('birth_place', 100)->nullable();
            $table->date('birth_date')->nullable();
            $table->boolean('active')->nullable()->default(true);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('class_room_id')->references('id')->on('class_rooms')->onDelete('restrict');
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
