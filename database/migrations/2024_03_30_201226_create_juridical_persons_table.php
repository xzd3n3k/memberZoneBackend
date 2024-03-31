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
        Schema::create('juridical_persons', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('registration_number')->nullable();
            $table->string('compant')->nullable();
            $table->string('street')->nullable();
            $table->string('post_code')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('province')->nullable();
            $table->string('email')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('phone')->nullable();
            $table->boolean('active')->nullable();
            $table->boolean('payed')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('juridical_persons');
    }
};
