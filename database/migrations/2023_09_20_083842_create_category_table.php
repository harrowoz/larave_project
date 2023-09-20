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
        Schema::create('category', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('name', 200)->unique();
            $table->tinyInteger('status')->default(1)->comment('1 là hiển thị, 0 ẩn');
            $table->tinyInteger('priority')->default(0)->comment('Sắp xếp thứ tự danh mục theo thứ tự 0 1 2 ...');
            $table->date('created_at')->default(now());
            $table->date('updated_at')->default(now());

            $table->foreign('parent_id')->references('id')->on('category');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category');
    }
};
