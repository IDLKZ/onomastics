<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->foreignId("author_id")->references("id")->on("users")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId("language_id")->references("id")->on("languages")->cascadeOnDelete()->cascadeOnUpdate();
            $table->string("alias");
            $table->string("title");
            $table->string("subtitle");
            $table->string("img")->default("/no-image.png");
            $table->string("thumbnail")->default("/no-image.png");
            $table->text("content");
            $table->json("links")->nullable();
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
        Schema::dropIfExists('news');
    }
}
