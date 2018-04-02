<?php

use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entries = 
        [
            [
                "id" => "1",
                "name" => "Johor"
            ],
            [
                "id" => "2",
                "name" => "Kedah"
            ],
            [
                "id" => "3",
                "name" => "Kelantan"
            ],
            [
                "id" => "4",
                "name" => "Melaka"
            ],
            [
                "id" => "5",
                "name" => "Negeri Sembilan"
            ],
            [
                "id" => "6",
                "name" => "Pahang"
            ],
            [
                "id" => "7",
                "name" => "Pulau Pinang"
            ],
            [
                "id" => "8",
                "name" => "Perak"
            ],
            [
                "id" => "9",
                "name" => "Perlis"
            ],
            [
                "id" => "10",
                "name" => "Selangor"
            ],
            [
                "id" => "11",
                "name" => "Terengganu"
            ],
            [
                "id" => "12",
                "name" => "Sabah"
            ],
            [
                "id" => "13",
                "name" => "Sarawak"
            ],
            [
                "id" => "14",
                "name" => "W.P Kuala Lumpur"
            ],
            [
                "id" => "15",
                "name" => "W.P Labuan"
            ],
            [
                "id" => "16",
                "name" => "W.P Putrajaya"
            ]
        ];

        foreach($entries as $entry){
            DB::table('states')->insert($entry);
        }
    }
}
