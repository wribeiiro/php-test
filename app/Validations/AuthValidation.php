<?php

namespace App\Validations;

use App\Validations\AbstractValidation;

class AuthValidation extends AbstractValidation {

    public function validateAuth(array $data):? array {

        return $this->validate($data, [
            'email'    => 'required|email|exists:users',
            'password' => 'required|string'
        ]);
    }
}
