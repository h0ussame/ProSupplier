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
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('manager_id');
            $table->unsignedBigInteger('supplier_id');
            $table->decimal('offered_price', 8, 2)->nullable();
            $table->enum('status', ['pending', 'offered', 'accepted', 'declined'])->default('pending');
            $table->string('motif')->nullable();
            $table->timestamps();
            $table->foreign('manager_id')->references('id')->on('manager')->onDelete('cascade');
            $table->foreign('supplier_id')->references('id')->on('supplier')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
