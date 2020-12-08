<?php

namespace App\Repositories;

use App\Models\Speaker;
use Illuminate\Support\Facades\DB;

class SpeakerRepository
{
    /**
     * @var Speaker
     */
    private $model;

    public function __construct()
    {
        $this->model = new Speaker();
    }

    public function findById(int $id) {
        return $this->model->find($id);
    }

}
