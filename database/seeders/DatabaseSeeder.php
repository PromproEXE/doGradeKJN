<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'a',
            'username' => 'a',
            'email' => 'promproexe@outlook.co.th',
            'password' => Hash::make('a'),
            'can_dograde' => true,
            'can_manage_user' => true,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now(),
        ]);
    }
}
