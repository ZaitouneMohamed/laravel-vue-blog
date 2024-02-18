<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(["name"=> "admin"]);
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);
        $user->assignRole('admin');
    }
}
