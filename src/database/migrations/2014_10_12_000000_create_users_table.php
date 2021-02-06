<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    protected $connection = 'mongodb';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function($collection)
        {
            $collection->bigIncrements('id');
            $collection->string('nome');
            $collection->unique('email');
            $collection->string('password');
            $collection->unique('username_git');
            $collection->string('logradouro');
            $collection->string('complemento');
            $collection->string('bairro');
            $collection->string('cidade');
            $collection->string('estado');
            $collection->json('linguagem_pref');
            $collection->timestamps();
        });
        /*
        Schema::create('usuario', function (Blueprint $collection) {
            $collection->bigIncrements('id');
            $collection->string('nome', 30)->text('Nome');
            $collection->string('username_git', 30)->unique();
            $collection->string('logradouro');
            $collection->string('complemento');
            $collection->string('bairro');
            $collection->string('cidade');
            $collection->string('estado');
            $collection->json('linguagem_pref');
            $collection->timestamps();
        });
        */
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
