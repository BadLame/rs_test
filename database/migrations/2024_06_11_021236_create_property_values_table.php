<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    function up(): void
    {
        Schema::create('property_values', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')
                ->constrained('properties')
                ->cascadeOnDelete();
            $table->string('value');
            $table->timestamps();

            $table->index(['property_id', 'value']);
        });
    }

    function down(): void
    {
        Schema::dropIfExists('property_values');
    }
};
