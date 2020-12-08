<?php

namespace App\Validations;

use App\Validations\AbstractValidation;

class EventValidation extends AbstractValidation {

    public function validateEvent(array $data):? array {

        return $this->validate($data, [
            'title'       => 'required|string',
            'start_date'  => 'required|date',
            'end_date'    => 'required|date',
            'description' => 'required|string',
        ]);
    }
}
