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
        Schema::create('account', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('email', 100)->unique();
            $table->string('phone', 100)->unique();
            $table->string('password', 100);
            $table->enum('role',['1','0'])->default(1);//1 la user,0 la admin
            $table->string('address', 255)->nullable();
            $table->tinyInteger('status')->default(1)->comment('1 là bình thường, 0 khóa acc');
            $table->date('created_at')->default(now());
            $table->date('updated_at')->default(now());
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account');
    }
};
