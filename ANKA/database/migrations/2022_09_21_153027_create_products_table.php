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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->integer('price')->default(0);
            $table->integer('total_quantity')->default(0);
            $table->integer('left_quantity')->default(0);
            $table->unsignedBigInteger('participants_id');
            $table->foreign('participants_id')->references('id')->on('products');
            $table->integer('return_buyer')->default(0);
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
        Schema::dropIfExists('ankaproduct');
    }
};
