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
            $table->bigIncrements("id");
            $table->foreignId("author_id")->references("id")->on("authors")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId("language_id")->references("id")->on("languages")->cascadeOnUpdate()->cascadeOnDelete();
            $table->string("alias");
            $table->string("title");
            $table->string("img")->nullable();
            $table->string("file")->nullable();
            $table->json("authors")->nullable();
            $table->text("description");
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
        Schema::dropIfExists('books');
    }
}
