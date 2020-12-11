<?php

namespace App\Repositories;

use App\Models\Lecture;
use Illuminate\Support\Facades\DB;

class LecturesRepository
{
    /**
     * @var Lecture
     */
    private $model;

    public function __construct()
    {
        $this->model = new Lecture();
    }

    /**
     * Get all Lectures.
     *
     * @return Lecture $model
     */
    public function getAll() {
        return $this->model
                    ->with(['event', 'speaker'])
                    ->get();
    }

    /**
     * Get Lecture by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id) {
        return $this->model
                    ->where('id', $id)
                    ->with(['event', 'speaker'])
                    ->get();
    }

    /**
     * Save Lecture
     *
     * @param array $data
     * @return Lecture
     */
    public function save(array $data) {

        $this->model->title       = $data['title'];
        $this->model->date        = $data['date'];
        $this->model->event_id    = $data['event_id'];
        $this->model->start_time  = $data['start_time'];
        $this->model->end_time    = $data['end_time'];
        $this->model->description = $data['description'];
        $this->model->speaker_id  = $data['speaker_id'];
        $this->model->save();

        return $this->model->fresh();
    }

    /**
     * Update Lecture
     *
     * @param array $data
     * @param integer $id
     * @return Lecture
     */
    public function update(array $data, int $id) {

        $lecture = $this->model->find($id);

        $lecture->title       = $data['title'];
        $lecture->date        = $data['date'];
        $lecture->event_id    = $data['event_id'];
        $lecture->start_time  = $data['start_time'];
        $lecture->end_time    = $data['end_time'];
        $lecture->description = $data['description'];
        $lecture->speaker_id  = $data['speaker_id'];
        $lecture->update();

        return $lecture;
    }

    /**
     * Delete Lecture
     *
     * @return Lecture
     */
    public function delete(int $id) {

        $lecture = $this->model->where('id', $id)->first();

        if ($lecture !== null) {
            $lecture->delete();
        }

        return $lecture;
    }
}
