<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('book_id');
            $table->string('title', 100);
            $table->string('author', 25);
            $table->string('isbn', 25)->nullable(); 
            $table->integer('pages_count')->unsigned();
            $table->date('published_date')->nullable(); 
            $table->integer('language_id')->unsigned();
            //$table->timestamps();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->engine = 'InnoDB';
        });
        
        Schema::table('books', function($table) {
            $table->foreign('language_id')->references('language_id')->on('languages'); 
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
