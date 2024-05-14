<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Block;

class blockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        block::create([
            'user' => '1',
            'block_user' => '2',
        ]);
        block::create([
            'user' => '1',
            'block_user' => '3',
        ]);
        block::create([
            'user' => '2',
            'block_user' => '3',
        ]);
    }
}