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
        Schema::create('property', function (Blueprint $table) {
            $table->id('property_ID');
            $table->string('country');
            $table->year('built');
            $table->string('Property_type');
            $table->string('Nearby_parking');
            $table->integer('area');
            $table->integer('Price');
            $table->binary('picture')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property'); // Define down method to drop the table if needed
    }
};
