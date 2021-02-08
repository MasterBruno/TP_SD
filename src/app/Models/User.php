<?php

namespace App\Models;


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
    'name',
    'email',
    'password', 
    'username_git', 
    'public_place',
    'complement',
    'neighborhood',
    'city',
    'state',        
    'preferred_language',        
  ];

  protected $hidden = [
    //  Itens escondidos na serialização
    'passowrd',
  ];
  protected $visible = [
    //  Itens visíveis na serialização
    '_id',
    'name',
    'email', 
    'username_git', 
    'public_place',
    'complement',
    'neighborhood',
    'city',
    'state',        
    'preferred_language',        
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
      'name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users',
      'password' => 'required|string|min:8',
      'username_git' => 'string|max:255',
      'public_place' => 'string|max:255',
      'complement' => 'string|max:255',
      'neighborhood' => 'string|max:255',
      'city' => 'required|string|max:255',
      'state' => 'required|string|max:255',
    ];
  }
}
