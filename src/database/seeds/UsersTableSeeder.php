<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\User;

class UsersTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    User::insert([
      [
        'name'              => 'Bruno César',
        'username_git'      => 'brunocesarr',
        'email'             => 'brunoc.15@hotmail.com',
        'password'          => Hash::make('12345678'),
        'public_place'      => null,
        'complement'        => null,
        'neighborhood'      => null,
        'city'              => 'Itamarandiba',
        'state'             => 'MG',
        'preferred_language'=> [
          'Java',
          'Python',
        ],
        'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at'        => Carbon::now()->format('Y-m-d H:i:s'),
      ],
      [
        'name'              => 'Matheus Andrade',
        'username_git'      => 'MTalke',
        'email'             => 'matheus_afl@hotmail.com',
        'password'          => Hash::make('12345678'),
        'public_place'      => null,
        'complemento'       => null,
        'neighborhood'      => null,
        'city'              => 'Curvelo',
        'state'             => 'MG',
        'preferred_language'=> [
          'PHP',
          'Python',
        ],
        'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at'        => Carbon::now()->format('Y-m-d H:i:s'),
      ]
    ]);
  }
}
