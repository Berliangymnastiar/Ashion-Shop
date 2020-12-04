<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNumberPhoneAndRolesToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('avatar')->nullable()->after('name');
            $table->string('roles')->default('USER')->after('email');
            $table->string('number_phone')->nullable()->after('roles');
            $table->string('address_one')->nullable()->after('password');
            $table->string('address_two')->nullable()->after('address_one');
            $table->integer('provinces_id')->nullable()->after('address_two');
            $table->integer('regencies_id')->nullable()->after('provinces_id');
            $table->integer('zip_code')->nullable()->after('regencies_id');
            $table->string('country')->nullable()->after('zip_code');
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
            $table->dropColumn('roles');
            $table->dropColumn('number_phone');
            $table->dropColumn('address_one');
            $table->dropColumn('address_two');
            $table->dropColumn('provinces_id');
            $table->dropColumn('regencies_id');
            $table->dropColumn('zip_code');
            $table->dropColumn('country');
        });
    }
}
