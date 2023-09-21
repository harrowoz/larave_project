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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('name', 200);
            $table->string('image', 200);
            $table->decimal('price', 9, 3);
            $table->decimal('sale_price', 9, 3)->default(0);
            $table->text('description')->nullable();
            $table->text('image_list')->nullable();
            $table->tinyInteger('status')->default(1)->comment('1 là hiển thị, 0 ẩn');
            $table->unsignedBigInteger('category_id');
            $table->date('created_at')->default(now());
            $table->date('updated_at')->default(now());

            $table->foreign('parent_id')->references('id')->on('product');
            $table->foreign('category_id')->references('id')->on('category');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
