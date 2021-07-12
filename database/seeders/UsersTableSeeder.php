<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => (string) Str::uuid(),
            'name' => 'Admin Admin',
            'email' => 'dev@dev.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123123'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
