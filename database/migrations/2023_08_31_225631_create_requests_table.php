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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->string('Email');
            $table->string('Number');
            $table->string('Company_name')->nullable();
            $table->string('Industry');
            $table->string('Service');
            $table->text('Desc')->nullable();
            $table->string('Project_file')->nullable();
            $table->string('pkg_price');
            $table->string('pkg_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
