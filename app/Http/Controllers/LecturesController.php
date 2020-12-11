<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\EventsRepository;
use App\Repositories\SpeakersRepository;

use Illuminate\Http\Request;

class LecturesController extends Controller
{

    public function viewLectures() {
        return view('lectures.index', [
            'speakers' => (new SpeakersRepository())->getAll(),
            'events'   => (new EventsRepository())->getAll()
        ]);
    }
}
