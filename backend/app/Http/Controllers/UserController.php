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
    //  Buscar usuário por cidade
    public function findCity($cidade) {
        $users = User::all()->where('cidade', 'like', 'Diamantina');

        //dd($users);

        if(empty($users)) {
            return response()->json([
                'message' => 'Não encontrado.'
            ], 404);
        }

        return response()->json($users);
    }

    //  Buscar usuário por estado
    public function findState($estado) {
        $users = User::all()->where('estado', 'like', 'Minas Gerais');

        if(empty($users)) {
            return response()->json([
                'message' => 'Não encontrado.'
            ], 404);
        }

        return response()->json($users);
    }

    //  Buscar usuário por linguagem preferida
    public function findLanguage($language) {
    }


    //  Buscar usuário por cidade e linguagem preferida
    public function findCity_LP($cidade_lig) {
        $users = User::where();

        if(empty($users)) {
            return response()->json([
                'message' => 'Não encontrado.'
            ], 404);
        }

        return response()->json($users);
    }

    //  Buscar usuário por estado
    public function findState_LP($estado_lig) {
        $users = User::where();

        if(empty($users)) {
            return response()->json([
                'message' => 'Não encontrado.'
            ], 404);
        }

        return response()->json($users);
    }


    public function register(Request $request){
        $validated = $request->validated();

        if ($validated->fails()){
            return response()->json($validated->errors()->toJson(), 400);
        }

        $user = User::create([
            'nome'          => $request->get('nome'),
            'email'         => $request->get('email'),
            'password'      => Hash::make($request->get('password')),
            'username_git'  => $request->get('username_git'),
            'logradouro'    => $request->get('logradouro'),
            'complemento'   => $request->get('complemento'),
            'bairro'        => $request->get('bairro'),
            'cidade'        => $request->get('cidade'),
            'estado'        => $request->get('estado'),
            'linguagem_pref'=> $request->get('linguagem_pref'),
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json(compact('user', 'token'), 201);
    }

    public function login(Request $request) {
        $credentials = $request->all();

        dd(JWTAuth::attempt($request->get('_token')));

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_creat_token'], 500);
        }

        return response()->json( compact('token'));
    }

    public function getAuthenticatedUser()
    {
        try {
            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            } 
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['token_expired'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['token_invalid'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['token_absent'], $e->getStatusCode());
        }

        response()->json( compact('user') );
    }

}
