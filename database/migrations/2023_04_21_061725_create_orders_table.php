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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('item_uuid')->nullable();
            $table->string('user_id')->nullable();
            $table->string('user_name')->nullable();
            $table->text('user_address')->nullable();
            $table->string('user_country')->nullable();
            $table->string('user_zip')->nullable();
            $table->string('User_city')->nullable();
            $table->string('User_state')->nullable();
            $table->string('User_uuid')->nullable();
            $table->string('item_size')->nullable();
            $table->string('item_quantity')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
