<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthRepository
{
    /**
     * @var User
     */
    private $model;

    public function __construct()
    {
        $this->model = new User();
    }

    /**
     * authenticate
     *
     * @param string $email
     * @param string $password
     * @return object|boolean
     */
    public function authenticate(string $email, string $password)
    {
        $model = $this->model->where('email', $email)
            ->first();

        if ($model && Hash::check($password, $model->password)) {
            return $model;
        }

        return false;
    }
}
