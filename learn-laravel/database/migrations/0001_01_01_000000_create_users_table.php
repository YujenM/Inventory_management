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
        // Users table
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id'); // Primary Key
            $table->string('user_name', 255);
            $table->string('user_email', 255)->unique();
            $table->string('user_password', 255);
            $table->timestamps(); // created_at, updated_at
            $table->engine = 'InnoDB';
        });

        // Sessions table
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->unsignedBigInteger('user_id'); 
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade'); 
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
            $table->engine = 'InnoDB';
        });

        // Products table
        Schema::create('products', function (Blueprint $table) {
            $table->id('product_id'); // Primary Key
            $table->string('product_name', 255);
            $table->float('product_price');
            $table->integer('product_quantity');
            $table->timestamps();
            $table->unsignedBigInteger('user_id'); 
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade'); 
            $table->engine = 'InnoDB';
        });

        // Purchases table
        Schema::create('purchases', function (Blueprint $table) {
            $table->id('purchase_id'); // Primary Key
            $table->integer('quantity');
            $table->float('unit_cost');
            $table->float('total_cost');
            $table->timestamps();
            $table->unsignedBigInteger('product_id'); 
            $table->foreign('product_id')->references('product_id')->on('products')->onDelete('cascade'); 
            $table->engine = 'InnoDB';
        });

        // Sales table
        Schema::create('sales', function (Blueprint $table) {
            $table->id('sales_id'); // Primary Key
            $table->integer('quantity');
            $table->float('unit_cost');
            $table->float('total_amount');
            $table->timestamps();
            $table->unsignedBigInteger('product_id'); 
            $table->unsignedBigInteger('user_id'); 
            $table->foreign('product_id')->references('product_id')->on('products')->onDelete('cascade'); 
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade'); 
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('users');
        Schema::dropIfExists('products');
        Schema::dropIfExists('purchases');
        Schema::dropIfExists('sales');
    }
};
