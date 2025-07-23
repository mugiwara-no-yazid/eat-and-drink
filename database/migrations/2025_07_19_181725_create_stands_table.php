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
        Schema::create('stands', function (Blueprint $table) {
            $table->id();
            $table->string('name_stand');
            $table->string('category');
            $table->string('description');
            $table->string('logo')->nullable();
            $table->foreignId('proprietaire_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
            $table->enum('status', ['pending', 'accepted', 'rejected']);
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stands');
    }
};
