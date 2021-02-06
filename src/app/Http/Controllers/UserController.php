<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\User;

use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Facades\JWTFactory;
use Tymon\JWTAuth\Exception\JWTException;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Tymon\JWTAuth\PayloadFactory;
use Tymon\JWTAuth\JWTManager as JWT;

class UserController extends Controller
{

    public function __construct(){
        $this->middleware('auth', ['only' => ['update', 'destroy', 'edit']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $user = new User();
        $user->fill($request->all());
        $user->save();

        return response()->json($user, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::find($id);

        if(empty($users)) {
            return response()->json([
                'message' => 'Não encontrado.'
            ], 404);
        }

        return response()->json($users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $users = User::find($id);

        if(empty($users)) {
            return response()->json([
                'message' => 'Não encontrado.'
            ], 404);
        }

        $users->fill($request->all());
        $users->save();

        return response()->json($users);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::find($id);

        if(empty($users)) {
            return response()->json([
                'message' => 'Não encontrado.'
            ], 404);
        }

        $users->delete();

        return response()->json([
            'message' => 'Registro Deletado.'
        ], 200);
    }



    //  Metodo extras
    //  Buscar usuário por nome
    public function findName($nome) {
        $users = User::where('nome', 'LIKE', "%$nome%")->get();

        if(empty($users)) {
            return response()->json([
                'message' => 'Não encontrado.'
            ], 404);
        }

        return response()->json($users);
    }

    //  Buscar usuário por cidade
    public function findCity($cidade) {
        $users = User::where('cidade', 'LIKE', "%$cidade%")->get();

        if(empty($users)) {
            return response()->json([
                'message' => 'Não encontrado.'
            ], 404);
        }

        return response()->json($users);
    }

    //  Buscar usuário por estado
    public function findState($estado) {
        $users = User::where('estado', 'LIKE', "%$estado%")->get();

        if(empty($users)) {
            return response()->json([
                'message' => 'Não encontrado.'
            ], 404);
        }

        return response()->json($users);
    }

    //  Buscar usuário por linguagem preferida
    public function findLanguage($language) {
        $users = User::where('linguagem_pref', 'LIKE', "%$language%")->get();

        if(empty($users)) {
            return response()->json([
                'message' => 'Não encontrado.'
            ], 404);
        }

        return response()->json($users);
    }


    //  Buscar usuário por cidade e linguagem preferida
    public function findCity_LP($cidade, $language) {
        $users = User::where('cidade', 'LIKE', "%$cidade%")
                     ->where('linguagem_pref', 'LIKE', "%$language%")->get();

        if(empty($users)) {
            return response()->json([
                'message' => 'Não encontrado.'
            ], 404);
        }

        return response()->json($users);
    }

    //  Buscar usuário por estado e linguagem preferida
    public function findState_LP($estado, $language) {
        $users = User::where('estado', 'LIKE', "%$estado%")
                     ->where('linguagem_pref', 'LIKE', "%$language%")->get();

        if(empty($users)) {
            return response()->json([
                'message' => 'Não encontrado.'
            ], 404);
        }

        return response()->json($users);
    }
}
