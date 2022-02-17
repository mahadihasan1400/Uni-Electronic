<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;



class CompanyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 100; $i++) {
            DB::table('company_users')->insert([

                'name' => Str::random(10),
                'company_email' => Str::random(10) . "@gmail.com",
                'company_name' => Str::random(10),




            ]);
        }
    }
}
