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
            $table->string('slug');
            $table->enum('gender',['male','female']);
            $table->string('description')->nullable();
            $table->double('price',10,2);
            $table->double('compare_price',10,2)->nullable();
            $table->foreignId('category_id')->constrained(table: 'category', indexName: 'id')->onDelete('cascade');
            $table->enum('is_fetured',['yes','no'])->default('no');
            $table->string('sku');
            $table->enum('track_qty',['yes','no'])->default('no');    
            $table->integer('qty');
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
