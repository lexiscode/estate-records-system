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
        Schema::create('service_charges', function (Blueprint $table) {
            $table->id();
            $table->string('tenant_name');
            $table->string('apartment');
            $table->string('status');
            $table->unsignedBigInteger('generator_fee')->nullable();
            $table->unsignedBigInteger('nepa_light_fee')->nullable();
            $table->unsignedBigInteger('sockaway_fee')->nullable();
            $table->unsignedBigInteger('borehole_fee')->nullable();
            $table->date('payment_date');
            $table->unsignedBigInteger('debt_amount')->nullable();
            $table->date('debt_due_date')->nullable();
            $table->date('charge_due_date');
            $table->string('payment_method');
            $table->string('payment_proof')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_charges');
    }
};
