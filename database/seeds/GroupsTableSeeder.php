<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupsTableSeeder extends Seeder
{

    private $array = [
      ["First", "Lorem ipsum dolor sit amet, consectetur adipisicing elit.", "1"],
      ["Second Group", "Aut cumque delectus ex incidunt iusto laboriosam maxime nobis, odit sunt ullam.", "2"],
      ["3rd group", "Aspernatur doloremque in ipsum minima nostrum qui quod tenetur vitae!", "3"]
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
                DB::table('groups')->insert([
                   'name' => $index[0],
                   'description' => $index[1],
                   'owner_id' => $index[2],
                   'created_at' => DB::raw('now()'),
                   'updated_at' => DB::raw('now()')
                ]);
            }
        }
    }
}
