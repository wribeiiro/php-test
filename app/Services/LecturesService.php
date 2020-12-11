<?php

namespace App\Services;

use App\Repositories\LecturesRepository;
use App\Validations\LecturesValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LecturesService
{
    /**
     * @var $lecture_repository
     */
    protected $lecture_repository;

    /**
     * LecturesRepository constructor.
     *
     * @param LecturesRepository $lectureRepository
     */
    public function __construct(LecturesRepository $lectureRepository)
    {
        $this->lecture_repository = $lectureRepository;
    }

    public function getAll() {
        return $this->lecture_repository->getAll();
    }

    public function getLecture(int $id) {
        return $this->lecture_repository->getById($id);
    }

    public function createLecture(array $data) {

        $this->validate = (new LecturesValidation)->validateCreate($data);

        if ($this->validate !== null) {
            return $this->validate;
        }

        $result = $this->lecture_repository->save($data);

        return $result;
    }

    public function updateLecture(array $data, int $id) {
        $this->validate = (new LecturesValidation)->validateCreate($data);

        if ($this->validate !== null) {
            return $this->validate;
        }

        try {
            $event = $this->lecture_repository->update($data, $id);
        } catch (\Exception $e) {
            $event = $e->getMessage();
        }

        return $event;
    }

    public function deleteLecture(int $id) {

        try {
            $event = $this->lecture_repository->delete($id);
        } catch (\Exception $e) {
            $event = $e->getMessage();
        }

        return $event;
    }
}
