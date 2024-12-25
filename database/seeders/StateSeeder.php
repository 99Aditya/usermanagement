<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\State;
class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $inputs = [
            [
                'name' => 'ANDHRA PRADESH',
                'code' => 'AP',
            ],[
                'name' => 'ASSAM',
                'code' => 'ASM',
            ],[
                'name' => 'BIHAR',
                'code' => 'BH',
            ],[
                'name' => 'Gujarat',
                'code' => 'GJ',
            ],[
                'name' => 'Madhya Pradesh',
                'code' => 'MP',
            ],[
                'name' => 'Rajasthan',
                'code' => 'RJ',
            ],
        ];

        State::insert($inputs);
    }
}
