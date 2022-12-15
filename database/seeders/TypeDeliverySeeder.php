<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class TypeDeliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_deliveries')->insert([
            [
                'name'       => 'Retiro o delivery',
                'status'     => true,
                'created_at' => Carbon::now()
            ],
            [
                'name'       => 'Retiro',
                'status'     => true,
                'created_at' => Carbon::now()
            ]
        ]);
    }
}
