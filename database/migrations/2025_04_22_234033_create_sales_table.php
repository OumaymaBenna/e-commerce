<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('sales', function (Blueprint $table) {
        $table->id();
        $table->decimal('amount', 10, 2);
        $table->timestamp('sale_date')->default(DB::raw('CURRENT_TIMESTAMP'));
        $table->integer('product_id');
        $table->integer('quantity');
        $table->integer('user_id');
        $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->timestamps();
    });
}

    


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
