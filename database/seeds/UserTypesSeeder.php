<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTypesSeeder extends Seeder
{

    private $array = [
        "User",
        "Moderator",
        "Admin",
        "Developer"
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if( is_array($this->array) && count($this->array) > 0){
            foreach ($this->array as $index) {
                DB::table('user_types')->insert([
                   'user_type' => $index,
                    'global' => false,
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()')
                ]);
            }
        }
    }
}
