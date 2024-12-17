<?php

namespace Database\Seeders;

use App\Enums\UserTypeEnum;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(
            [
                UserSeeder::class,
            ]
        );

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'ydscalamba@gmail.com',
            'status' => true
        ])->assignRole(Role::findByName(UserTypeEnum::Admin->value));
    }
}
