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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount', 10, 2);
            $table->date('payment_date');
            $table->unsignedBigInteger('related_id');
            $table->string('related_type');
            $table->string('status');
            $table->string('refid');
            $table->timestamps();

            // Foreign key to relate payment to an activity, sale, or purchase
            $table->foreign('related_id')->references('id')->on('activities')->onDelete('cascade');
            // Add similar foreign keys for 'sales' and 'purchases' tables if needed
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
