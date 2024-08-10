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
        Schema::create('borrowed_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained('items')->onDelete('cascade');
            $table->string('item_name');
            $table->string('category');
            $table->string('unit_of_measure');
            $table->string('room_number');
            $table->string('school_level');
            $table->string('student_id');
            $table->integer('quantity');
            $table->date('borrow_date');
            $table->date('return_date');
            $table->string('status');
            $table->string('adviser');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrowed_items');
    }
};
