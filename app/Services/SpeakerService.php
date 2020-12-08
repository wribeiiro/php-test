<?php

namespace App\Services;

use App\Repositories\SpeakerRepository;
use App\Validations\SpeakerValidation;
use Illuminate\Http\Request;

class SpeakerService
{
    /**
     * @var $speaker_repository
     */
    protected $speaker_repository;

    /**
     * SpeakerRepository constructor.
     *
     * @param SpeakerRepository $speakerRepository
     */
    public function __construct(SpeakerRepository $speakerRepository)
    {
        $this->speaker_repository = $speakerRepository;
    }

}
