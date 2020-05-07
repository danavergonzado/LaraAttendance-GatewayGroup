<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 30);
            $table->string('position', 30)->nullable();
            $table->string('employee_id', 8)->nullable();
            $table->string('company_id',2)->nullable();
            $table->string('branch_id',2)->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at');
            $table->string('password', 75);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
