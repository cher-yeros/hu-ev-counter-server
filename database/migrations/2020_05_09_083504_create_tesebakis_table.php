<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTesebakisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tesebakis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sebaki_id');
            $table->unsignedBigInteger('campus_id');
            $table->string('name')->nullable();
            $table->string('type');
            $table->string('phone')->nullable();
            $table->string('gender')->nullable();
            $table->timestamps();

            $table->unique(['name','phone']);
            // $table->unique(['name','phone','type','gender']);
            $table->unique(['phone','type','gender']);

            $table->unique(['type','phone']);
            // $table->unique(['sebaki_id','name','phone','type','gender']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tesebakis');
    }
}
