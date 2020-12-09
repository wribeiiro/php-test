<?php

namespace App\Services;

use App\Repositories\EventRepository;
use App\Validations\EventValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EventService
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
    public function __construct(EventRepository $eventRepository)
    {
        $this->event_repository = $eventRepository;
    }

}
