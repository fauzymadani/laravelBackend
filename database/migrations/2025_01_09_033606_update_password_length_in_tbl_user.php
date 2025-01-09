<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePasswordLengthInTblUser extends Migration
{
    public function up()
    {
        Schema::table('tbl_user', function (Blueprint $table) {
            $table->string('password', 255)->change();
        });
    }

    public function down()
    {
        Schema::table('tbl_user', function (Blueprint $table) {
            $table->string('password', 50)->change();
        });
    }
}
