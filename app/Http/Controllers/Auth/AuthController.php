<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Http\{ Request, JsonResponse };

use App\Http\Requests\Auth\{
  ProviderSignupRequest,
  ProviderSigninRequest,
  ClientSignupRequest,
  ClientSigninRequest,
  ModeratorSignupRequest,
  ModeratorSigninRequest,
  SignoutRequest,
};

use App\Http\Controllers\Controller;
use App\Models\Role;

class AuthController extends Controller
{

  #region ----------Авторизация----------
  public function signinModerator(ModeratorSigninRequest $request) : JsonResponse
  {
    $input  = $request->validated();
    $user   = $input['user'];
    $output = act('Auth\\SigninAction', $user);
    return response()->json($output, 200);
  }

  public function signinProvider(ProviderSigninRequest $request) : JsonResponse
  {
    $input  = $request->validated();
    $user   = $input['user'];
    $output = act('Auth\\SigninAction', $user);
    return response()->json($output, 200);
  }

  public function signinClient(ClientSigninRequest $request) : JsonResponse
  {
    $input  = $request->validated();
    $user   = $input['user'];
    $output = act('Auth\\SigninAction', $user);
    return response()->json($output, 200);
  }
  #endregion

  #region ----------Регистрация----------
  public function signupModerator(ModeratorSignupRequest $request) : JsonResponse
  {
    $input  = $request->validated();
    $user   = $input['user'];
    $output = act('Auth\\SignupAction', $user, Role::MODERATOR);
    return response()->json($output, 200);
  }

  public function signupProvider(ProviderSignupRequest $request) : JsonResponse
  {
    $input  = $request->validated();
    $user   = $input['user'];
    $output = act('Auth\\SignupAction', $user, Role::PROVIDER);
    return response()->json($output, 200);
  }

  public function signupClient(ClientSignupRequest $request) : JsonResponse
  {
    $input  = $request->validated();
    $user   = $input['user'];
    $output = act('Auth\\SignupAction', $user, Role::CLIENT);
    return response()->json($output, 200);
  }
  #endregion


  /**
   * Разлогинить пользователя
   */
  public function signout(SignoutRequest $request) : JsonResponse
  {
    act('Auth\\SignoutAction');
    return response()->json(['message' => 'Successfully logged out']);
  }
}
