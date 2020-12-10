<?php

namespace App\Services;

use App\Repositories\LecturesRepository;
use App\Validations\LecturesValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LectureService
{
    /**
     * @var $lecture_repository
     */
    protected $lecture_repository;

    /**
     * LecturesService constructor.
     *
     * @param LecturesRepository $lectureRepository
     */
    public function __construct(LecturesRepository $lectureRepository)
    {
        $this->lecture_repository = $lectureRepository;
    }

}
