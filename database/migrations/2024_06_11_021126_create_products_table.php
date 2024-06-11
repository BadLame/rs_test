<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->float('price')->unsigned();
            $table->unsignedInteger('amount')->default(0);
            $table->timestamps();
        });
    }

    function down(): void
    {
        Schema::dropIfExists('products');
    }
};
