<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('items')->insert([
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'name' => 'お茶',
                'kakaku' => '100',
                'bunrui' => '1',
                'shosai' => '万人受けします',
            
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'name' => 'お水',
                'kakaku' => '90',
                'bunrui' => '1',
                'shosai' => '非常時にオススメ',
            
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'name' => '炭酸水',
                'kakaku' => '120',
                'bunrui' => '1',
                'shosai' => '刺激的感覚',
            
            ],
        ]);

        //
    }
}
