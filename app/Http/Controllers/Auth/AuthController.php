<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Http\JsonResponse;

use App\Http\Requests\Auth\{
  ProviderSignupRequest,
  ProviderSigninRequest,
  ClientSignupRequest,
  ClientSigninRequest,
  ModeratorSignupRequest,
  ModeratorSigninRequest,
  SignoutRequest,
  VerificationRequest,
};

use App\Actions\Auth\{
  SigninAction,
  ModeratorSignupAction,
  ProviderSignupAction,
  ClientSignupAction,
  SendVerificationSMSAction,
  SignoutAction,
};

use App\Http\Controllers\Controller;

class AuthController extends Controller
{
  #region ----------Авторизация----------
  public function signinModerator(ModeratorSigninRequest $request) : JsonResponse
  {
    $input = $request->validated();
    $phone    = $input['phone'];
    $password = $input['password'];

    $output = SigninAction::run($phone, $password);
    return response()->json($output, 200);
  }

  public function signinProvider(ProviderSigninRequest $request) : JsonResponse
  {
    $input = $request->validated();
    $phone    = $input['phone'];
    $password = $input['password'];

    $output = SigninAction::run($phone, $password);
    return response()->json($output, 200);
  }

  public function signinClient(ClientSigninRequest $request) : JsonResponse
  {
    $input = $request->validated();
    $phone    = $input['phone'];
    $password = $input['password'];

    $output = SigninAction::run($phone, $password);
    return response()->json($output, 200);
  }
  #endregion

  #region ----------Регистрация----------
  public function signupModerator(ModeratorSignupRequest $request) : JsonResponse
  {
    $input = $request->validated();
    $phone    = $input['phone'];
    $password = $input['password'];
    $code     = $input['code'];

    $output = ModeratorSignupAction::run($phone, $password, $code);
    return response()->json($output, 200);
  }

  public function signupProvider(ProviderSignupRequest $request) : JsonResponse
  {
    $input = $request->validated();
    $phone    = $input['phone'];
    $password = $input['password'];
    $code     = $input['code'];

    $output = ProviderSignupAction::run($phone, $password, $code);
    return response()->json($output, 200);
  }

  public function signupClient(ClientSignupRequest $request) : JsonResponse
  {
    $input = $request->validated();
    $phone    = $input['phone'];
    $password = $input['password'];
    $code     = $input['code'];

    $output = ClientSignupAction::run($phone, $password, $code);
    return response()->json($output, 200);
  }
  #endregion

  #region ----------Верификация----------
  public function verification(VerificationRequest $request) : JsonResponse
  {
    $input = $request->validated();
    $phone = $input['phone'];

    $output = SendVerificationSMSAction::run($phone);
    return response()->json($output, 200);
  }
  #endregion


  /**
   * Разлогинить пользователя
   */
  public function signout(SignoutRequest $request) : JsonResponse
  {
    SignoutAction::run();
    return response()->json(['message' => 'Successfully logged out']);
  }
}
