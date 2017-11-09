<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('gender');
            $table->string('city');
            $table->string('games_played')->default(0);
            $table->decimal('exp_point', 4, 2)->default(0);
            $table->char('football_level');
            $table->integer('football_played')->default(0);
            $table->char('soccer_level');
            $table->integer('soccer_played')->default(0);
            $table->char('basketball_level');
            $table->integer('basketball_played')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'gender',
                'city',
                'games_played',
                'exp_point',
                'football_level',
                'football_played',
                'soccer_played',
                'soccer_level',
                'basketball_played'
                ]);
        });
    }
}
