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
        Schema::create('reports', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('reported_id');
            $table->Integer('reporter_id');
            $table->Integer('admin_id')->nullable();
            $table->Integer('post_id')->nullable();
            $table->Integer('comment_id')->nullable();
            $table->timestamp('reported_on');
            $table->tinytext('report')-> nullable();



            
            $table->foreign('reported_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('reporter_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('admin_id')->references('id')->on('users')->nullable()->onDelete('cascade');
            $table->foreign('post_id')->references('id')->on('posts')->nullable()->onDelete('cascade');
            $table->foreign('comment_id')->references('id')->on('comments')->nullable()->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
