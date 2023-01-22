<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = ['New', 'Processed','Completed'];
        
        foreach ($statuses as $status) {
            DB::table('cart_statuses')->insert([
                'name' =>  $status
            ]);
        }
    }
}
