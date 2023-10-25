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
        Schema::create('tbl_tour_deatil__img', function (Blueprint $table) {
            $table->increments('tour_deatil_img_id');
            $table->integer('tour_deatil_id');
            $table->string('tour_deatil_img_link',1000);
            $table->integer('tour_deatil_img_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_tour_deatil__img');
    }
};
