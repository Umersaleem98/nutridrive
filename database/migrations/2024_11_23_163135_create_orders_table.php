<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Foreign key for users table
            $table->string('first_name');
            $table->string('last_name');
            $table->string('company_name')->nullable(); // Nullable field
            $table->text('address');
            $table->string('state');
            $table->string('postal_code');
            $table->string('email');
            $table->string('phone');
            $table->text('order_notes')->nullable(); // Nullable field
            $table->decimal('total', 10, 2)->default(0);
            $table->string('status')->default('pending'); // Default value
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
