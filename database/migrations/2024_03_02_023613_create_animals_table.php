<?php

use App\Models\AnimalTypology;
use App\Models\Breed;
use App\Models\Customer;
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
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Customer::class)->references('id')->on('customers')->cascadeOnDelete();
            $table->foreignIdFor(Breed::class)->references('id')->on('breeds')->cascadeOnDelete();
            $table->string('name')->nullable();
            $table->date('birth')->nullable();
            $table->boolean('is_sterilized')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
