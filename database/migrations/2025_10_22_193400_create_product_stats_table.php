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
        Schema::create('product_stats', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('product_id');

            $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete();

            $table->decimal('revenue', 12, 2)->default(0);
            $table->decimal('conversion_rate', 5, 2)->default(0);

            $table->integer('sales_count')->default(0);

            $table->string('period')->default('month');

            $table->date('recorded_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_stats');
    }
};
