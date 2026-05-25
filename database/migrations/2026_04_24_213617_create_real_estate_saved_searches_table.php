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
        Schema::create('real_estate_saved_searches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('search_name')->nullable();
            $table->string('location')->nullable();
            $table->string('distance_min')->nullable();
            $table->string('distance_max')->nullable();
            $table->string('hr_miles')->nullable();
            $table->string('price_min')->nullable();
            $table->string('price_max')->nullable();
            $table->string('acre_min')->nullable();
            $table->string('acre_max')->nullable();
            $table->string('bedrooms_min')->nullable();
            $table->string('bedrooms_max')->nullable();
            $table->string('bathrooms_min')->nullable();
            $table->string('bathrooms_max')->nullable();
            $table->string('heated_barn')->nullable();
            $table->string('stall_min')->nullable();
            $table->string('stall_max')->nullable();
            $table->string('has_indoor_ring')->nullable();
            $table->string('has_outdoor_ring')->nullable();
            $table->string('fenced_grass')->nullable();
            $table->string('fencing')->nullable(); // stored as comma separated or json
            $table->string('amenitie')->nullable(); // stored as comma separated or json
            $table->json('filters')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('real_estate_saved_searches');
    }
};
