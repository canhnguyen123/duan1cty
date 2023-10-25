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
        Schema::create('tbl_service', function (Blueprint $table) {
            $table->increments('service_id');
            $table->string('service_code',100);
            $table->string('service_name',500);
            $table->integer('service_category');
            $table->double('service_price');
            $table->integer('service_status');
            $table->text('service_note');
            $table->text('service_infro');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_service');
    }
};
