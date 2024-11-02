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
            $table->foreignId('enhancer')->constrained('users')->onDelete('cascade');
            $table->string('name');
            $table->text('description');
            $table->integer('category_id');
            $table->integer('type');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('variants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('enhancer')->constrained('users')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->string('name');
            $table->bigInteger('price');
            $table->integer('stock')->default(0);
            $table->string('image')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('variants');
    }
};
