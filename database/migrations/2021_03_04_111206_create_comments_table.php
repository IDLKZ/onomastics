<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->foreignId("user_id")->references("id")->on("users")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId("news_id")->nullable()->references("id")->on("news")->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId("article_id")->nullable()->references("id")->on("articles")->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId("book_id")->nullable()->references("id")->on("books")->cascadeOnUpdate()->cascadeOnDelete();
            $table->integer("rating")->nullable();
            $table->string("comment");
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
        Schema::dropIfExists('comments');
    }
}
