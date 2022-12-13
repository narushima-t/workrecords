<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Record;

class RecordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Record::create([
            'user_id' => '1',
            'img' => 'sankosyo.jpg',
            'tittle' => 'ネクステ',
            'content' => 'P10~20',
        ]);
    }
}
