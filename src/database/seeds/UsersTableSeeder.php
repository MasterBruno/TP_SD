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
                'nome'          =>'Bruno César',
                'username_git'  =>'MasterBruno',
                'email'         =>'brunoc.15@hotmail.com',
                'password'      => Hash::make('12345678'),
                'logradouro'    =>'Rua 1',
                'complemento'   =>'Casa',
                'bairro'        =>'Bairro 1',
                'cidade'        =>'Diamantina',
                'estado'        =>'MG',
                'linguagem_pref'=> [
                    'Java',
                    'Python',
                ],
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nome'          =>'Matheus Andrade',
                'username_git'  =>'MTalke',
                'email'         =>'matheus_afl@hotmail.com',
                'password'      => Hash::make('12345678'),
                'logradouro'    =>'Rua 2',
                'complemento'   =>'Casa',
                'bairro'        =>'Bairro 1',
                'cidade'        =>'Diamantina',
                'estado'        =>'MG',
                'linguagem_pref'=> [
                    'PHP',
                    'Python',
                ],
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        ]);
    }
}
