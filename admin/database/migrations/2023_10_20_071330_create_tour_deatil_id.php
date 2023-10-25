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
        Schema::create('tour_deatil_id', function (Blueprint $table) {
            $table->integer('category_tour_id');
            $table->double('category_tour_price');
            $table->string('tour_deatil_code');
            $table->string('tour_deatil_name');
            $table->timestamp('tour_deatil_startTime')->nullable();
            $table->timestamp('tour_deatil_endTime')->nullable();
            $table->string('tour_deatil_transport');
            $table->text('tour_deatil_infro');
            $table->integer('category_tour_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_deatil_id');
    }
};
