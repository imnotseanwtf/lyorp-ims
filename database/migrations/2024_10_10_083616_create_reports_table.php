<?php

use App\Models\Folder;
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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();

            $table->integer('seminars_and_activities_conducted');
            $table->integer('recruitment');
            $table->string('others');
            $table->string('title');
            $table->string('content');
            $table->integer('status_report')->default(0);
            $table->string('reason')->nullable();
            $table->string('file')->nullable();

            $table->foreignIdFor(Folder::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();

            $table->boolean('status')->default(true);
            $table->boolean('is_notif')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
