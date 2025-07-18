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
