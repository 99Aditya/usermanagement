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
        Schema::create('user_heads', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('birthdate');
            $table->string('mobile');
            $table->string('address');
            $table->integer('state')->nullable();
            $table->integer('city')->nullable();
            $table->string('pincode')->nullable();
            $table->integer('martial_status')->comment('1=>married,2=>unmarried')->nullable();
            $table->date('married_date')->nullable();
            $table->text('hobbies');
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_heads');
    }
};
