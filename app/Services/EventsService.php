<?php

namespace App\Services;

use App\Repositories\EventsRepository;
use App\Validations\EventsValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EventsService
{
    /**
     * @var $event_repository
     */
    protected $event_repository;

    /**
     * EventService constructor.
     *
     * @param EventRepository $eventRepository
     */
    public function __construct(EventsRepository $eventRepository)
    {
        $this->event_repository = $eventRepository;
    }

    public function getAll() {
        return $this->event_repository->getAll();
    }

    public function getEvent(int $id) {
        return $this->event_repository->getById($id);
    }

    public function createEvent(array $data) {

        $this->validate = (new EventsValidation)->validateEvent($data);

        if ($this->validate !== null) {
            return $this->validate;
        }

        $result = $this->event_repository->save($data);

        return $result;
    }

    public function updateEvent(array $data, int $id) {
        $this->validate = (new EventsValidation)->validateEvent($data);

        if ($this->validate !== null) {
            return $this->validate;
        }

        try {
            $event = $this->event_repository->update($data, $id);
        } catch (\Exception $e) {
            $event = $e->getMessage();
        }

        return $event;
    }

    public function deleteEvent(int $id) {

        try {
            $event = $this->event_repository->delete($id);
        } catch (\Exception $e) {
            $event = $e->getMessage();
        }

        return $event;
    }
}
