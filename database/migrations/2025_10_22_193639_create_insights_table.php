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
        Schema::create('insights', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('category')->nullable(); 

            $table->text('description')->nullable();

            $table->decimal('ai_score', 5, 2)->nullable();

            $table->json('meta')->nullable();

            $table->timestamps();
        });

        Schema::create('insight_product', function (Blueprint $table) {
            $table->unsignedBigInteger('insight_id');

            $table->unsignedBigInteger('product_id');

            $table->primary(['insight_id', 'product_id']);
            
            $table->foreign('insight_id')->references('id')->on('insights')->cascadeOnDelete();
            $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insights');
    }
};
