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
            $table->unsignedBigInteger('tenant_id');
            $table->string('tenant_name');
            $table->string('apartment');
            $table->string('charge_fee');
            $table->string('status');
            $table->date('payment_date');
            $table->unsignedBigInteger('debt_amount')->nullable();
            $table->date('debt_due_date')->nullable();
            $table->date('charge_due_date');
            $table->string('payment_method');
            $table->string('payment_proof')->nullable();
            $table->text('notes');
            $table->timestamps();

            $table->foreign('tenant_id')->references('id')->on('tenants')->onDelete('cascade');
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
