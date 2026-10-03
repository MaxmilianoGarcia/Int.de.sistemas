<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('comercios', function (Blueprint $table) {
            $table->unique('nombre_comercio');
        });
    }

    public function down()
    {
        Schema::table('comercios', function (Blueprint $table) {
            $table->dropUnique(['nombre_comercio']);
        });
    }
};