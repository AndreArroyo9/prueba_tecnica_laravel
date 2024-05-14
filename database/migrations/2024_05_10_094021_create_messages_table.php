<?php

use App\Models\Chat;
use App\Models\Servicio;
use App\Models\User;
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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Chat::class, 'chat_id')->constrained()->cascadeOnDelete();
            $table->text('text')->nullable();
            $table->timestamps();
        });
        Schema::table('chats', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, 'user_id')->constrained()->cascadeOnDelete(); // Es un cliente, no el creador
            $table->foreignIdFor(Servicio::class, 'servicio_id')->constrained()->cascadeOnDelete(); // Es posible acceder al creador a través del servicio

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
