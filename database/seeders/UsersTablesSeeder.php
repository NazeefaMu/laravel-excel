<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create(
            [
                'name'=>'Dartx admin',
                'email'=>'dartx_admin@gmail.com',
                'password'=>Hash::make('password'),
                'remember_token'=> str::random(10)
            ]
        );
    }
}
