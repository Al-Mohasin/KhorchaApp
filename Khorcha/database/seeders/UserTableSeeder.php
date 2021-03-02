<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Superadmin",
            'email' => "superadmin@dm.com",
            'password' => Hash::make("123456Su"),
            'email_verified_at' => Carbon::now(),
            'role_id' => 1,
            'created_at' => Carbon::now(),
        ]);
    }
}
