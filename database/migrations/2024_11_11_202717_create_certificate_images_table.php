<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('certificate_images', function (Blueprint $table) {
            $table->id();

            $table->string('left_logo')->nullable();
            $table->string('right_logo')->nullable();

            $table->string('left_signiture')->nullable();
            $table->string('left_name')->nullable();

            $table->string('right_signiture')->nullable();
            $table->string('right_name')->nullable();

            $table->string('middle_signiture')->nullable();
            $table->string('middle_name')->nullable();

            $table->timestamps();
        });

        DB::table('certificate_images')->insert(
            [
                ['id' => 1]
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificate_images');
    }
};
