<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('subraddits', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->tinytext('name');
            $table->tinytext('about')->nullable();
            $table->tinytext('subraddit_picture_URL')->nullable();
            $table->tinytext('banner_picture_URL')->nullable();
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subraddits');
    }
};
