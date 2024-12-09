<?php

use App\Models\ActivityRequest;
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
        Schema::create('registered_participants', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ActivityRequest::class)->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->integer('age');
            $table->string('gender');
            $table->string('barangay');
            $table->string('name_of_organization')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registered_participants');
    }
};
