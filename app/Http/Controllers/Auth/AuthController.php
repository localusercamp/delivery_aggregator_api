<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Http\{ Request, JsonResponse };

use App\Http\Requests\Auth\{
  SellerSignupRequest,
  SellerSigninRequest,
  BuyerSignupRequest,
  BuyerSigninRequest,
  SignoutRequest,
};

use App\Http\Controllers\Controller;

class AuthController extends Controller
{
  /**
   * Авторизация
   */
  public function signinSeller(SellerSigninRequest $request) : JsonResponse
  {
    $input  = $request->validated();
    $user   = $input['user'];
    $output = act('Auth\\SigninAction', $user);
    return response()->json($output, 200);
  }

  public function signinBuyer(BuyerSigninRequest $request) : JsonResponse
  {
    $input  = $request->validated();
    $user   = $input['user'];
    $output = act('Auth\\SigninAction', $user);
    return response()->json($output, 200);
  }


  /**
   * Регистрация
   */
  public function signupSeller(SellerSignupRequest $request) : JsonResponse
  {
    $input  = $request->validated();
    $user   = $input['user'];
    $output = act('Auth\\SignupAction', $user);
    return response()->json($output, 200);
  }

  public function signupBuyer(BuyerSignupRequest $request) : JsonResponse
  {
    $input  = $request->validated();
    $user   = $input['user'];
    $output = act('Auth\\SignupAction', $user);
    return response()->json($output, 200);
  }


  /**
   * Разлогинить пользователя
   */
  public function signout(SignoutRequest $request) : JsonResponse
  {
    act('Auth\\SignoutAction');
    return response()->json(['message' => 'Successfully logged out']);
  }
}
