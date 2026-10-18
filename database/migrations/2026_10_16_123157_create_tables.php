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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('is_admin')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('color', 20);
            $table->string('image', 2048);
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->restrictOnDelete();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('origin')->nullable();
            $table->string('unit', 100);
            $table->string('image', 2048);
            $table->unsignedBigInteger('price');
            $table->unsignedBigInteger('sale_price')->nullable();
            $table->unsignedInteger('stock');
            $table->unsignedInteger('version')->default(1);
            $table->boolean('active')->default(true);
            $table->boolean('featured')->default(false);
            $table->timestamps();

            $table->index(['active', 'category_id'], 'products_catalogue_index');
        });

        Schema::create('delivery_zones', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('fee')->nullable();
            $table->timestamps();
        });

        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->string('code', 50)->unique();
            $table->unsignedInteger('percentage');
            $table->boolean('active')->default(true);
            $table->timestamp('expiresAt')->nullable();
            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('delivery_zone_id')->constrained('delivery_zones')->restrictOnDelete();
            $table->string('reference', 50)->unique();
            $table->uuid('checkout_token')->unique();
            $table->string('zone_name');
            $table->text('addresse')->nullable();
            $table->string('fulfillmentMode', 20);
            $table->text('note')->nullable();
            $table->unsignedBigInteger('subtotal');
            $table->unsignedTinyInteger('discount_percentage')->default(0);
            $table->unsignedBigInteger('discount_amount')->default(0);
            $table->unsignedInteger('delivery_fee');
            $table->unsignedBigInteger('total');
            $table->string('status', 30)->default('EN_ATTENTE');
            $table->boolean('stock_applied')->default(false);
            $table->boolean('stock_restored')->default(false);
            $table->dateTime('canceled_at')->nullable();
            $table->timestamps();

            $table->index(['status', 'created_at'], 'order_index');
        });

        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders');
            $table->foreignId('product_id')->constrained('products');
            $table->string('name');
            $table->string('units', 100);
            $table->unsignedBigInteger('unit_price');
            $table->unsignedInteger('quantity');
            $table->unsignedBigInteger('line_total');
            $table->timestamps();

            $table->unique(['order_id', 'product_id'], 'order_item_unique_column');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('products');
    }
};
