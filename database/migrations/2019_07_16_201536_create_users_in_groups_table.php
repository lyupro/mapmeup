<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersInGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_in_groups', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedInteger('group_id');
            $table->foreign('group_id')->references('id')->on('groups');

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedInteger('user_type_id');
            $table->foreign('user_type_id')->references('id')->on('user_types');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_in_groups');
    }
}
