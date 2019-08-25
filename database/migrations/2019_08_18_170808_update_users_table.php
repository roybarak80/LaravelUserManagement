<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
           
            $table->integer('user_id')->after('id');
            $table->string('user_type')->after('user_id');
            $table->string('email')->unique()->after('user_type');
            $table->string('first_name')->after('password');
            $table->string('last_name')->after('first_name');
            $table->date('demo_expiration_date')->nullable()->after('last_name');
            $table->integer('credit_card_last_digits')->nullable()->after('demo_expiration_date');
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
            $table->dropColumn(['hobbies', 'user_birthday', 'related_friends']);
        });
    }
}
