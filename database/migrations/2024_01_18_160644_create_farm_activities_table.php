<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('farm_activities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('farm_unit_id');
            $table->unsignedBigInteger('employee_id')->nullable();
            $table->string('activity_name');
            $table->timestamps();

            $table->foreign('farm_unit_id')->references('id')->on('farm_units')->onDelete('cascade');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('set null');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farm_activities');
    }
};
