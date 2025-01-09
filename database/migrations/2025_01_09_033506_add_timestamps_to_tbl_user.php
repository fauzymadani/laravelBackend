<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimestampsToTblUser extends Migration
{
    public function up()
    {
        Schema::table('tbl_user', function (Blueprint $table) {
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('tbl_user', function (Blueprint $table) {
            $table->dropTimestamps();
        });
    }
}
