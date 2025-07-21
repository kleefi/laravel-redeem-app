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
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->string('action'); // contoh: update_redeem, delete_reward
            $table->string('target_type'); // misal: Redeem, Reward
            $table->uuid('target_id'); // ID dari data yang dimodifikasi
            $table->json('changes')->nullable(); // bisa isi: ['status' => ['pending', 'done']]
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logs');
    }
};
