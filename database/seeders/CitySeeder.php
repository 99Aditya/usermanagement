<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;
class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $inputs = [
            [
                'name' => 'Achampalle',
                'code' => 'ACH',
                'state_id' => 1,
            ],[
                'name' => 'Adadakulapalli',
                'code' => 'ADAD',
                'state_id' => 1,
            ],[
                'name' => 'Agali',
                'code' => 'AG',
                'state_id' => 1,
            ],[
                'name' => 'Agraharam',
                'code' => 'AGA',
                'state_id' => 1,
            ],[
                'name' => 'Guwahati',
                'code' => 'GU',
                'state_id' => 2,
            ],[
                'name' => 'Silchar',
                'code' => 'SIL',
                'state_id' => 2,
            ],[
                'name' => 'Dibrugarh',
                'code' => 'DIB',
                'state_id' => 2,
            ],[
                'name' => 'Jorhat',
                'code' => 'JOR',
                'state_id' => 2,
            ],[
                'name' => '	Patna',
                'code' => 'PT',
                'state_id' => 3,
            ],[
                'name' => 'Gaya',
                'code' => 'GAYA',
                'state_id' => 3,
            ],[
                'name' => 'Bhagalpur',
                'code' => 'BG',
                'state_id' => 3,
            ],[
                'name' => 'Muzaffarpur',
                'code' => 'MUZ',
                'state_id' => 3,
            ],[
                'name' => 'Ahmedabad',
                'code' => 'AHM',
                'state_id' => 4,
            ],[
                'name' => 'Surat',
                'code' => 'SU',
                'state_id' => 4,
            ],[
                'name' => 'Vadodara',
                'code' => 'VAD',
                'state_id' => 4,
            ],[
                'name' => 'Rajkot',
                'code' => 'RA',
                'state_id' => 4,
            ],[
                'name' => 'Itarsi',
                'code' => 'ET',
                'state_id' => 5,
            ],[
                'name' => 'Bhopal',
                'code' => 'BPL',
                'state_id' => 5,
            ],[
                'name' => 'Indore',
                'code' => 'IND',
                'state_id' => 5,
            ],[
                'name' => 'Ujjain',
                'code' => 'UJ',
                'state_id' => 5,
            ],[
                'name' => 'Jaipur',
                'code' => 'JP',
                'state_id' => 6,
            ],[
                'name' => 'Udaipur',
                'code' => 'UP',
                'state_id' => 6,
            ],[
                'name' => 'Bikanar',
                'code' => 'BIK',
                'state_id' => 6,
            ],[
                'name' => 'Chomu',
                'code' => 'CH',
                'state_id' => 6,
            ]
        ];

        City::insert($inputs);
    }
}
