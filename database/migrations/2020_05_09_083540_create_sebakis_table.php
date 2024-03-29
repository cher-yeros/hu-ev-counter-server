<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSebakisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sebakis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('campus_id');
            $table->string('name');
            $table->string('phone');
            $table->string('username')->unique();
            $table->string('password');
            $table->boolean('approved')->default(false);
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
        Schema::dropIfExists('sebakis');
    }
}
