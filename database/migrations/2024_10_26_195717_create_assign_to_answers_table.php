<?php

use App\Models\Criteria;
use App\Models\Question;
use App\Models\User;
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
        Schema::create('assign_to_answers', function (Blueprint $table) {
            $table->id();

            $table->foreignId('assign_user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignIdFor(Criteria::class)->constrained()->cascadeOnDelete();

            $table->boolean('is_answered')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assign_to_answers');
    }
};
