<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BunruisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('bunruis')->insert([
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'id' => 1,
                'str' => 'コカコーラ',
            
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'id' => 2,
                'str' => '伊藤園',
            
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'id' => 3,
                'str' => 'キリン',
            
            ],
        ]);
       

        //
    }
}
