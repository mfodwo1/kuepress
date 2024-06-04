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
        Schema::create('design_category_mappings', function (Blueprint $table) {
            $table->foreignId('design_id')->constrained('designs');
            $table->foreignId('category_id')->constrained('design_categories');
            $table->primary(['design_id', 'category_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('design_category_mappings');
    }
};
