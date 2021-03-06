<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->foreignId("role_id")->references("id")->on("roles")->cascadeOnUpdate()->cascadeOnDelete();
            $table->string("email")->unique();
            $table->string("name");
            $table->string("phone")->nullable();
            $table->string("img")->default("/no-image.png");
            $table->string("password");
            $table->integer("status")->default(0);
            $table->integer("banned")->default(0);
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
        Schema::dropIfExists('users');
    }
}
