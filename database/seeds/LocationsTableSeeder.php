<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationsTableSeeder extends Seeder
{
    private $array = [
        [1, 'Love.Fish', '580 Darling Street, Rozelle, NSW', '-33.861034', '151.171936', 'restaurant'],
        [2, 'Young Henrys', '76 Wilford Street, Newtown, NSW', '-33.898113', '151.174469', 'bar'],
        [2, 'Three Blue Ducks', '43 Macpherson Street, Bronte, NSW', '-33.906357', '151.263763', 'restaurant']
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if( is_array($this->array) && count($this->array) > 0){
            foreach ($this->array as $index){
                DB::table('locations')->insert([
                    'user_id' => $index[0],
                    'name' => $index[1],
                    'address' => $index[2],
                    'latitude' => $index[3],
                    'longitude' => $index[4],
                    'type' => $index[5],
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()')
                ]);
            }
        }
    }
}
