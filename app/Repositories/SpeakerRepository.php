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

    /**
     * Get all speakers.
     *
     * @return Speakers $model
     */
    public function getAll() {
        return $this->model
                    ->get();
    }

    /**
     * Get speaker by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id) {
        return $this->model
                    ->where('id', $id)
                    ->get();
    }

    /**
     * Save Speaker
     *
     * @param array $data
     * @return Speaker
     */
    public function save(array $data) {

        $this->model->name = $data['name'];
        $this->model->save();

        return $this->model->fresh();
    }

    /**
     * Update Speaker
     *
     * @param array $data
     * @param integer $id
     * @return Speaker
     */
    public function update(array $data, int $id) {

        $speaker = $this->model->find($id);

        $speaker->name = $data['name'];
        $speaker->update();

        return $speaker;
    }

    /**
     * Delete Speaker
     *
     * @return Speaker
     */
    public function delete(int $id) {

        $speaker = $this->model->where('id', $id)->first();

        if ($speaker !== null) {
            $speaker->delete();
        }

        return $speaker;
    }
}
