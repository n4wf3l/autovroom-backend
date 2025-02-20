<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('brand');
            $table->string('model');
            $table->integer('year');
            $table->string('engine_type');
            $table->string('part_name');
            $table->string('chassis_number')->nullable();
            $table->string('reference_number')->nullable();
            $table->integer('quantity');
            $table->string('category')->nullable();
            $table->string('photo')->nullable(); // Stocker le chemin de la photo
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
