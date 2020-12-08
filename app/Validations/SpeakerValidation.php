<?php

namespace App\Validations;

use App\Validations\AbstractValidation;

class SpeakerValidation extends AbstractValidation {

    public function validateCreate(array $data):? array {

        return $this->validate($data, [
            'name'   => 'required|string'
        ]);
    }
}
