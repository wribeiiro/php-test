<?php

namespace App\Repositories;

use App\Models\Event;
use Illuminate\Support\Facades\DB;

class EventRepository
{
    /**
     * @var Event
     */
    private $model;

    public function __construct()
    {
        $this->model = new Event();
    }
}
