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
            $table->string('name', 100);
            $table->string('email', 100);
            $table->string('phone', 100);
            $table->string('role', 50)->default('customer');
            $table->string('address', 255)->nullable();
            $table->tinyInteger('status')->default(1)->comment('1 là bình thường, 0 khóa acc');
            $table->unsignedBigInteger('account_id');
            $table->date('created_at')->default(now());
            $table->date('updated_at')->default(now());

            $table->foreign('account_id')->references('id')->on('account');
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
