<?php

namespace App\Repositories;

use App\Models\Lecture;
use Illuminate\Support\Facades\DB;

class LectureRepository
{
    /**
     * @var Lecture
     */
    private $model;

    public function __construct()
    {
        $this->model = new Lecture();
    }

    public function findById(int $id) {
        return $this->model->find($id);
    }

}
