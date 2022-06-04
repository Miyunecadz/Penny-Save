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
        Schema::create('piggies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')->on('users')->onDelete('cascade');
            $table->string('name');
            $table->string('description')->nullable();
            $table->double('amount')->default(0);
            $table->double('range');
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
        Schema::dropIfExists('piggies');
    }
};
