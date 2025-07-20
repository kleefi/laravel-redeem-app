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
        Schema::create('redeems', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string("name", 50);
            $table->string("province");
            $table->string("city");
            $table->string("district");
            $table->string("email");
            $table->string("phone", 15);
            $table->string("unique_code")->unique();
            $table->string("unique_code_image");
            $table->enum("source", ["instagram", "tiktok", "facebook", "lainnya"]);
            $table->enum('status', ['pending', 'process', 'done'])->default('pending');
            $table->foreignUuid('voucher_id')->nullable()->constrained('vouchers')->nullOnDelete();
            $table->foreignUuid('reward_id')->nullable()->constrained('rewards')->nullOnDelete();
            $table->text('admin_notes')->nullable();
            $table->boolean('is_winner')->default(false);
            $table->timestamp('selected_as_winner_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('redeems');
    }
};
