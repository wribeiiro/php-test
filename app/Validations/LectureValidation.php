<?php

namespace App\Validations;

use App\Validations\AbstractValidation;

class LectureValidation extends AbstractValidation {

    public function validateCreate(array $data):? array {

        return $this->validate($data, [
            'title'       => 'required|string',
            'date'        => 'required|date',
            'event_id'    => 'required|integer',
            'start_time'  => 'required|date_format:H:i:s',
            'end_time'    => 'required|date_format:H:i:s',
            'description' => 'required|string',
            'speaker_id'  => 'required|integer'
        ]);
    }
}
