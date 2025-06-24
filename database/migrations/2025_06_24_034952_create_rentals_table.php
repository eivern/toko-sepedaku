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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
            $table->foreignId('bicycle_id')->constrained('bicycles')->onDelete('cascade');
            $table->foreignId('user_id')->comment('Admin ID')->constrained('users')->onDelete('cascade');
            $table->integer('duration_hours');
            $table->decimal('total_price', 10, 2);
            $table->enum('status', ['Disewa', 'Selesai', 'Dibatalkan'])->default('Disewa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
