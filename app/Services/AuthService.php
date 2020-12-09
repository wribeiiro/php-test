<?php

namespace App\Services;

use App\Repositories\AuthRepository;
use App\Validations\AuthValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthService
{
    /**
     * @var $auth_repository
     */
    protected $auth_repository;

    /**
     * AuthRepository constructor.
     *
     * @param AuthRepository $authRepository
     */
    public function __construct(AuthRepository $authRepository)
    {
        $this->auth_repository = $authRepository;
    }

    public function auth(Request $request): array {

        $data = $request->only([
            'email',
            'password'
        ]);

        $this->validate = (new AuthValidation)->validateAuth($data);

        if ($this->validate) {
            return $this->validate;
        }

        $user = $this->auth_repository->authenticate(
            $request->input('email', FILTER_SANITIZE_EMAIL),
            $request->input('password', FILTER_SANITIZE_STRING)
        );

        if ($user) {

            session()->put('sessionUser', [
                'id'         => $user->id,
                'email'      => $user->email,
                'username'   => explode('@', $user->email)[1],
                'isLoggedIn' => true
            ]);

            return [
                'data' => 'OK',
                'code' => 200
            ];
        }

        return [
            'data' => 'Unauthorized',
            'code' => 401
        ];
    }
}


