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
        Schema::create('admins_subraddits_link', function (Blueprint $table) {  
            $table->integer('admin_id');
            $table->integer('subraddit_id');

            $table->foreign('admin_id')->references('id')->on('users');
            $table->foreign('subraddit_id')->references('id')->on('subraddits');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins_subraddits_link');
    }
};
