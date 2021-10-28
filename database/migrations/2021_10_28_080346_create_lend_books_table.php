<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLendBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lend_books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lend_id');
            $table->unsignedBigInteger('book_id');

            $table->foreign('lend_id')->references('id')->on('lends')->onDelete('cascade');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('restrict');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lend_books');
    }
}
