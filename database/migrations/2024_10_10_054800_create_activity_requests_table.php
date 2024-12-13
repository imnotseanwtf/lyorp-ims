<?php

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
        Schema::create('activity_requests', function (Blueprint $table) {
            $table->id();

            $table->string('activity_name'); // Name of the activity
            $table->date('date'); // Date of the activity
            $table->time('time'); // Time of the activity
            $table->string('venue'); // Venue of the activity
            $table->text('specific_objectives'); // Specific objectives of the discussion
            $table->text('specific_outputs'); // Specific outputs of the discussion
            $table->json('topics')->nullable(); // JSON array of selected topics
            $table->json('equipment')->nullable();

            $table->json('audience')->nullable();
            $table->text('others')->nullable();
            $table->integer('expected_number_of_participants');

            $table->integer('activity_status')->default(0);

            $table->text('others_equipment')->nullable();

            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->integer('status')->default(false);
            $table->string('file');
            $table->boolean('is_notif')->default(false);

            $table->text('reason')->nullable();
            $table->text('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_requests');
    }
};
