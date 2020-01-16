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
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('address')->nullable();
            $table->date('birthday')->nullable();
            $table->string('gender')->nullable();
            $table->date('start_work')->nullable();
//            $table->boolean('is_admin')->nullable();
            $table->boolean('is_first_login')->nullable();
            $table->softDeletes(); // xoa ma khong mat du lieu trong db
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
