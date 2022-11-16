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
        Schema::create('subject_lists', function (Blueprint $table) {
            $table->id();
            $table->string('subject_id');
            $table->string('class')->nullable(false);
            $table->string('subject_name')->nullable(false);
            $table->string('teach_by')->nullable(false);
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
        Schema::dropIfExists('subject_lists');
    }
};
