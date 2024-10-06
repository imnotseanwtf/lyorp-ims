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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_of_the_primary_representative')->nullable();
            $table->string('email')->unique();
            $table->string('facebook_url')->nullable();
            $table->string('phone_number')->nullable();
            $table->integer('age')->nullable();
            $table->string('sex')->nullable();
            $table->string('duty_accomplished_registration_form')->nullable();
            $table->string('list_of_officers_and_adviser')->nullable();
            $table->string('list_of_member_in_good_standing')->nullable();
            $table->string('constitution_and_by_laws')->nullable();
            $table->string('endorsement_certification_from_proper_authority')->nullable();
            $table->boolean('status')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};