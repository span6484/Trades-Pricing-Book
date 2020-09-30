<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserTypeToTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('user_type')->after('user_name')->nullable();
            $table->dropColumn('user_firstlast');
            $table->dropColumn('user_archived');
            
        });
        Schema::table('users', function(Blueprint $table) {
            $table->string('user_firstlast')->nullable();
            $table->tinyInteger('user_archived')->default(0);
            
        });
        $user = new App\User();
        $user->password = Hash::make('secret');
        $user->user_name = 'the-email@example.com';
        $user->save();

        $user = new App\User();
        $user->password = Hash::make('password');
        $user->user_name = 'jquintal';
        $user->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('user_type');
        });
    }
}
