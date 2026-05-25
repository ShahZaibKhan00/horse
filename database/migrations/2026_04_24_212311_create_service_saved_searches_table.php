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
        Schema::create('service_saved_searches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('search_name')->nullable();
            $table->string('location')->nullable();
            $table->string('distance_min')->nullable();
            $table->string('distance_max')->nullable();
            $table->string('hr_miles')->nullable();
            $table->string('name')->nullable();
            $table->string('health')->nullable();
            $table->string('holistic')->nullable();
            $table->string('breeding')->nullable();
            $table->string('leasing')->nullable();
            $table->string('transport')->nullable();
            $table->string('grooming')->nullable();
            $table->string('recreational')->nullable();
            $table->string('performance')->nullable();
            $table->string('property')->nullable();
            $table->string('boarding')->nullable();
            $table->string('farrier')->nullable();
            $table->string('consulting')->nullable();
            $table->string('retail')->nullable();
            $table->string('promotion')->nullable();
            $table->json('filters')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_saved_searches');
    }
};
