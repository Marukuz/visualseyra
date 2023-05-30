<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users',function (Blueprint $table){
            $table->string('password')->nullable()->change();
            $table->string('dni')->nullable()->change();
            $table->string('telefono')->nullable()->change();
            $table->string('avatar')->nullable()->after('tipo');
            $table->string('google_id')->nullable()->after('avatar');
            $table->string('external_auth')->nullable()->after('google_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
