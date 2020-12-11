<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Validations\AuthValidation;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'loginForm']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only([
            'email',
            'password'
        ]);

        $this->validate = (new AuthValidation)->validateAuth($request->all());

        if ($this->validate) {
            return response()->json($this->validate, 400);
        }

        try {

            if (!$token = auth('api')->attempt($credentials)) {
                return response()->json([
                    'code' => 401,
                    'data' => 'Unauthorized'
                ], 401);
            }

            return response()->json($this->getToken($token), 200);

        } catch (\Exception $e) {

            return response()->json([
                "data" => $e->getMessage(),
                "code" => 500
            ], 500);
        }
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json([
            'code' => 200,
            'data' => auth('api')->user()
        ], 200);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth('api')->logout();

        return response()->json([
            'code' => 200,
            'data' => 'Successfully logged out'
        ], 200);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return response()->json($this->getToken(auth('api')->refresh(), 200));
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return array
     */
    protected function getToken($token)
    {
        return [
            'code' => 200,
            'data' => [
                'access_token'  => $token,
                'token_type'    => 'bearer',
                'expires_in'    => auth('api')->factory()->getTTL() * 180
            ]
        ];
    }

    public function loginForm(Request $request) {

        $credentials = $request->only([
            'email',
            'password'
        ]);

        $this->validate = (new AuthValidation)->validateAuth($request->all());

        if ($this->validate !== null) {
            return response()->json($this->validate, 400);
        }

        try {
            if (!$token = auth('api')->attempt($credentials)) {
                return response()->json([
                    'code' => 401,
                    'data' => 'Unauthorized'
                ], 401);
            }

            session()->put('sessionUser', [
                'id'          => $this->me()->original['data']->id,
                'email'       => $this->me()->original['data']->email,
                'username'    => explode('@', $this->me()->original['data']->email)[1],
                'isLoggedIn'  => true,
                'accessToken' => $this->getToken($token)['data']
            ]);

            return response()->json([
                "data" => $this->getToken($token)['data'],
                "code" => 200
            ], 200);

        } catch (\Exception $e) {

            return response()->json([
                "data" => $e->getMessage(),
                "code" => 500
            ], 500);
        }
    }

    public function logoutForm()
    {
        auth('api')->logout();

        session()->forget('sessionUser');

        return redirect('/');
    }
}
