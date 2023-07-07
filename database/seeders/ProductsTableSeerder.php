<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsTableSeerder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        products::create([
            'company_id' => '1',
            'product_name' => 'コーラ',
            'price' => '120',
            'stock' => '10',
            'comment' => '炭酸水',
            'img_path' => '',
        ]);
    }
}
