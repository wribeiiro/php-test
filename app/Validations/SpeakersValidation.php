<?php

namespace App\Validations;

use App\Validations\AbstractValidation;

class SpeakersValidation extends AbstractValidation {

    public function validateSpeaker(array $data):? array {

        return $this->validate($data, [
            'name'   => 'required|string'
        ]);
    }
}
