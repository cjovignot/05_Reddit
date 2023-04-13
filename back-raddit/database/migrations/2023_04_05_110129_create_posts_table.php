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
        Schema::create('posts', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
           
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate();
            $table->integer('author_id');
            $table->integer('subraddit_id');
            $table->tinytext('title');
            $table->text('content');
            $table->boolean('nsfw')->default(0);
            $table->boolean('spoiler')->default(0);
            $table->boolean('OC')->default(0);
            $table->integer('crops')->default(0);
            
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('subraddit_id')->references('id')->on('subraddits')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
