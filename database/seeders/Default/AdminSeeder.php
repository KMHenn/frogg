<?php

namespace Database\Seeders\Default;

use App\Support\Enums\CrochetRegions;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Support\Enums\UserRoles;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(User::where('email','kaithennessy@gmail.com')->exists()){
            return;
        }

        User::create([
            'username' => 'kmhenn',
            'email' => 'kaithennessy@gmail.com',
            'password' => env('DEFAULT_ADMIN_PASSWORD'),
            'default_region' => CrochetRegions::US,
            'role' => UserRoles::ADMINISTRATOR->value
        ]);
    }
}
