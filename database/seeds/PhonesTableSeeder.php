<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhonesTableSeeder extends Seeder
{
    private $array = [
        [1, '+38095', true, 'iPhone', 'Apple', 'iOS', '12'],
        [2, '+38050', true, 'iPhone', 'Apple', 'iOS', '11'],
        [3, '+7905', true, 'Mi5', 'Xiaomi', 'Android', '6.5']
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
                DB::table('phones')->insert([
                    'user_id' => $index[0],
                    'number' => $index[1],
                    'primary' => $index[2],
                    'model' => $index[3],
                    'company' => $index[4],
                    'os' => $index[5],
                    'os_version' => $index[6]
                ]);
            }
        }
    }
}
