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
        Schema::create('comments', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('author_id')->references('id')->on('users');
            $table->integer('post_id')->references('id')->on('posts');
            $table->text('content');
            $table->timestamp('Ccreated_at')->useCurrent();
            $table->timestamp('Cupdated_at')->useCurrentOnUpdate()->nullable();
            $table->integer('crops');
            $table->timestamps();


            $table->foreign('author_id')->references('id')->on('users');
            $table->foreign('post_id')->references('id')->on('posts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
