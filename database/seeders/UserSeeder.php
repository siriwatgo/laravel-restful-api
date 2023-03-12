<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User\UserModel;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = Str::random(10);
        $user = factory(UserModel::class)->create([
            'name' => Str::random(10),
            'email' => Str::random(10).'@example.com',
            'password' => Hash::make($password),
            'remember_token' => Str::random(10),
        ]);

        if ($user) {
            echo "Password: {$password}\n";
        } else {
            echo "Failed to seed User\n";
        }
    }
}
