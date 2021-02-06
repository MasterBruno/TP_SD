<?php

namespace App;


use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
//  use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\Access\Authorized;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Tymon\JWTAuth\Contracts\JWTSubject;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class User extends Eloquent implements JWTSubject, AuthenticatableContract
{
    use Notifiable;
    use Authenticatable;

    protected $connection = 'mongodb';
    protected $collection = 'users';


    protected $fillable = [
        'nome',
        'email',
        'password', 
        'username_git', 
        'logradouro',
        'complemento',
        'bairro',
        'cidade',
        'estado',        
        'linguagem_pref',        
    ];

    protected $hidden = [
        //  Itens escondidos na serialização
        'passowrd',
    ];
    protected $visible = [
        //  Itens visíveis na serialização
        '_id',
        'nome',
        'email', 
        'username_git', 
        'logradouro',
        'complemento',
        'bairro',
        'cidade',
        'estado',
        'linguagem_pref',
        'created_at'        
    ];
    /*
    protected $casts = [
        'linguagem_pref' => 'array'
    ];
    */

    public function getJWTIdentifier() {
        return $this->getKey();
    }

    public function getJWTCustomClaims() {
        return [];
    }

    public function rules() {
        return [
            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'username_git' => 'string|max:255',
            'logradouro' => 'required|string|max:255',
            'complemento' => 'required|string|max:255',
            'bairro' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
            'estado' => 'required|string|max:255',
        ];
    }
}
