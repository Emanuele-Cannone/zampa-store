<?php

use App\Models\Provider;
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
        Schema::create('provider_invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Provider::class)->references('id')->on('providers')->cascadeOnDelete();
            $table->decimal('amount',8,2);
            $table->date('date');
            $table->string('number');
            $table->boolean('paid')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provider_invoices');
    }
};
