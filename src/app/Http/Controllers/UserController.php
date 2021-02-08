<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\User;

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
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    try {
      $query = $this->getQueryWithUrlParameters($request);

      $users = $query->get();
      
      return response()->json($users);
    } catch (Throwable $exception) {
      error_log("Erro interno:", $exception->getMessage());
      return response()->json([
        'message' => 'Erro interno',
        'error' => $exception->getMessage()
      ], 500);
    }
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
    try {
      $user = new User();
      $user->fill($request->all());
      $user->save();

      return response()->json($user, 201);
    } catch (Throwable $exception) {
      error_log("Erro interno:", $exception->getMessage());
      return response()->json([
        'message' => 'Erro interno',
        'error' => $exception->getMessage()
      ], 500);
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    try {
      $users = User::find($id);

      if(empty($users)) {
        return response()->json([
          'message' => 'User not found.'
        ], 404);
      }
      return response()->json($users);
    } catch (Throwable $exception) {
      error_log("Erro interno:", $exception->getMessage());
      return response()->json([
        'message' => 'Erro interno',
        'error' => $exception->getMessage()
      ], 500);
    }
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
    try {
      $users = User::find($id);

      if(empty($users)) {
        return response()->json([
          'message' => 'User not found.'
        ], 404);
      }
      $users->fill($request->all());
      $users->save();

      return response()->json($users);
    } catch (Throwable $exception) {
      error_log("Erro interno:", $exception->getMessage());
      return response()->json([
        'message' => 'Erro interno',
        'error' => $exception->getMessage()
      ], 500);
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    try {
      $users = User::find($id);

      if(empty($users)) {
        return response()->json([
          'message' => 'User not found.'
        ], 404);
      }

      $users->delete();

      return response()->json([
        'message' => 'Deleted record.'
      ], 200);
    } catch (Throwable $exception) {
      error_log("Erro interno:", $exception->getMessage());
      return response()->json([
        'message' => 'Erro interno',
        'error' => $exception->getMessage()
      ], 500);
    }
  }

  /**
   * @param  \Illuminate\Http\Request  $request
   */
  private function getQueryWithUrlParameters(Request $request){
    $name = $request->get('name');
    $city = $request->get('city');
    $state = $request->get('state');
    $language = $request->get('language');

    $query = User::query();
    if ($name) {
      $query->where('name', 'LIKE', "%$name%");
    }
    if ($city) {
      $query->where('city', 'LIKE', "%$city%");
    }
    if ($state) {
      $query->where('state', 'LIKE', "%$state%");
    }
    if ($language) {
      $query->where('preferred_language', 'LIKE', "%$language%");
    }
    return $query;
  }
}
