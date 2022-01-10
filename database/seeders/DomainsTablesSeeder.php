<?php

namespace Database\Seeders;

use App\Models\Domain;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DomainsTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Domain::create(
            [
                'domain_name'=>'www.maxxus.com.auau',
            ]
        );
        Domain::create(
            [
                'domain_name'=>'www.urbanclassics.com.au',
            ]
        );
    }
}
