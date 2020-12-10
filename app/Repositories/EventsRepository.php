<?php

namespace App\Repositories;

use App\Models\Event;
use Illuminate\Support\Facades\DB;

class EventsRepository
{
    /**
     * @var Event
     */
    private $model;

    public function __construct()
    {
        $this->model = new Event();
    }

    /**
     * Get all Events.
     *
     * @return Event $model
     */
    public function getAll() {
        return $this->model
                    ->get();
    }

    /**
     * Get Event by id
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
     * Save Event
     *
     * @param array $data
     * @return Event
     */
    public function save(array $data) {

        $this->model->title         = $data['title'];
        $this->model->start_date    = $data['start_date'];
        $this->model->end_date      = $data['end_date'];
        $this->model->description   = $data['description'];
        $this->model->save();

        return $this->model->fresh();
    }

    /**
     * Update Event
     *
     * @param array $data
     * @param integer $id
     * @return Event
     */
    public function update(array $data, int $id) {

        $event = $this->model->find($id);

        $event->title        = $data['title'];
        $event->start_date   = $data['start_date'];
        $event->end_date     = $data['end_date'];
        $event->description  = $data['description'];
        $event->update();

        return $event;
    }

    /**
     * Delete Event
     *
     * @return Event
     */
    public function delete(int $id) {

        $event = $this->model->where('id', $id)->first();

        if ($event !== null) {
            $event->delete();
        }

        return $event;
    }
}
