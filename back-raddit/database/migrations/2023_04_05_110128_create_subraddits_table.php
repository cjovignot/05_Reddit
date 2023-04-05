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
            $table->tinytext('about');
            $table->tinytext('subraddit_picture_URL');
            $table->tinytext('banner_picture_URL');


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
