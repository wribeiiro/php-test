<?php

namespace App\Services;

use App\Repositories\LectureRepository;
use App\Validations\LectureValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LectureService
{
    /**
     * @var $lecture_repository
     */
    protected $lecture_repository;

    /**
     * LectureService constructor.
     *
     * @param LectureRepository $lectureRepository
     */
    public function __construct(LectureRepository $lectureRepository)
    {
        $this->lecture_repository = $lectureRepository;
    }

}
