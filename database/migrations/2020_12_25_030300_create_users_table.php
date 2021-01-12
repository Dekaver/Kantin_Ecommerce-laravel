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
            $table->foreignId('shop_id')
                ->nullable()
                ->constrained('shops')
                ->onUpdate('cascade')
                ->onDelete('SET NULL');
            $table->string('name');
            $table->string('email')
                ->unique();
            $table->timestamp('email_verified_at')
                ->nullable();
            $table->string('address')
                ->nullable();
            $table->string('password');
            $table->enum('role',['admin','user']);
            $table->enum('gender',['male', 'female']);
            $table->date('birth_day')
                ->nullable();
            $table->text('profile_photo')
                ->nullable();
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
