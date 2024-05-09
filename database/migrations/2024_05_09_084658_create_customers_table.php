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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class, 'user_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });

        Schema::create('customer_servicio', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Servicio::class, 'servicio_id')->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Customer::class, 'customer_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
