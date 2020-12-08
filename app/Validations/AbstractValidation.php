<?php

namespace App\Validations;

use Illuminate\Support\Facades\Validator;

abstract class AbstractValidation {

    private $valid = null;

    public function validate(array $data, array $rules):? array {

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            $this->valid = [
                'code' => 400,
                'data' => implode(" ", $validator->errors()->all()),
            ];
        }

        return $this->valid;
    }
}
