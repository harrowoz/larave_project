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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('gender',['man','women']);
            $table->string('slug')->unique();
            $table->string('sort_description')->nullable();
            $table->text('description')->nullable();
            $table->text('image');
            $table->double('price',10,2);
            $table->double('compare_price',10,2)->nullable();
            $table->foreignId('category_id')->constrained(table: 'categories', indexName: 'id')->onDelete('cascade');
            $table->enum('track_qty',['yes','no'])->default('no');
            $table->integer('qty')->default(1);
            $table->enum('is_featured',['yes','no'])->default('no');
            $table->integer('status')->default(1); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
