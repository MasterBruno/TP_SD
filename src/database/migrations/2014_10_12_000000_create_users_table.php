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
      $collection->string('name');
      $collection->unique('email');
      $collection->string('password');
      $collection->unique('username_git');
      $collection->string('public_place');
      $collection->string('complement');
      $collection->string('neighborhood');
      $collection->string('city');
      $collection->string('state');
      $collection->json('preferred_language');
      $collection->timestamps();
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
