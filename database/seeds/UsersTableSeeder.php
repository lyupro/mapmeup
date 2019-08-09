<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{

    private $array = [
        ["Max","Lyu"],
        ["Alex","Shmzkh"],
        ["Маргарита","Лопарева"]
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
                DB::table('users')->insert([
                    'name' => $index[0],
                    'lastname' => $index[1],
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()')
                ]);
            }
        }
    }
}
