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
        Schema::create('welcome_information', function (Blueprint $table) {
            $table->id();

            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('email_two')->nullable();
            $table->string('number')->nullable();
            $table->string('facebook')->nullable();

            $table->timestamps();
        });

        DB::table('welcome_information')->insert(
            [['id' => 1]]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('welcome_information');
    }
};
