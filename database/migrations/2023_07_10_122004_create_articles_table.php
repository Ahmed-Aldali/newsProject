<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            
            $table->string('image')->nullable();
            $table->json('title');
            $table->json('short_description');
            $table->json('full_description');
			$table->json('tags')->nullable();

            $table->foreignId('category_id');
            $table->foreign('category_id')->on('categories')->references('id')->cascadeOnDelete();
            $table->foreignId('author_id');
            $table->foreign('author_id')->on('authors')->references('id')->cascadeOnDelete();

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
        Schema::dropIfExists('articles');
    }
}