<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title', 200);
            $table->unsignedSmallInteger('book_type_id');
            $table->unsignedInteger('bookcase_id');
            $table->smallInteger('stock');
            $table->string('isbn', 200);
            $table->string('publisher', 200);
            $table->string('author', 200);
            $table->smallInteger('published_year');
            $table->smallInteger('page_count');
            $table->string('condition', 100);
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('book_type_id')->references('id')->on('book_types')->onDelete('restrict');
            $table->foreign('bookcase_id')->references('id')->on('bookcases')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
