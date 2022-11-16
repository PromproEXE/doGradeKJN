<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentdata', function (Blueprint $table) {
            $table->id('std_id')->autoIncrement(false)->primary();
            $table->string('name');
            $table->integer('class');
            $table->integer('room');
            $table->integer('number');
            $table->json('grade_term_1')->nullable();
            $table->json('grade_term_2')->nullable();
            $table->json('grade_term_3')->nullable();
            $table->json('grade_term_4')->nullable();
            $table->json('grade_term_5')->nullable();
            $table->json('grade_term_6')->nullable();
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
        Schema::dropIfExists('studentdata');
    }
};
