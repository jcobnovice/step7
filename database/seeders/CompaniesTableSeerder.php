<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompaniesTableSeerder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        companies::create([
            'company_name' => 'コカ・コーラ',
            'street_address' => 'アメリカ',
            'representative_name' => 'ホルヘ・ガルドゥニョ',
        ]);
    }
}
