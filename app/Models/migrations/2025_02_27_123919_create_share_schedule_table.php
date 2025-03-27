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
        Schema::create('share_schedule', function (Blueprint $table) {
            $table->unsignedBigInteger('sharer_id');
            $table->unsignedBigInteger('receiver_id');
            $table->unsignedBigInteger('schedule_id');
            $table->foreign('sharer_id')->references('id')->on('users');
            $table->foreign('receiver_id')->references('id')->on('users');
            $table->foreign('schedule_id')->references('id')->on('schedules');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('share_schedule');
    }
};
