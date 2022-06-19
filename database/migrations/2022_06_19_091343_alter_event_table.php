<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->string('venue')->nullable()->change();
            $table->string('address_one')->nullable()->change();
            $table->string('region')->nullable()->change();
            $table->string('post_code')->nullable()->change();
            $table->string('email')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->string('venue')->change();
            $table->string('address_one')->change();
            $table->string('region')->change();
            $table->string('post_code')->change();
            $table->string('email')->change();
        });
    }
}
