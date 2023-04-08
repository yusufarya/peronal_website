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
        Schema::create('header', function (Blueprint $table) {
            $table->id();
            $table->string('background')->nullable();
            $table->string('hero')->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('label1', 30)->nullable();
            $table->string('label2', 30)->nullable();
            $table->string('label3', 30)->nullable();
            $table->string('aktif', 1);
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
        Schema::dropIfExists('header');
    }
};
