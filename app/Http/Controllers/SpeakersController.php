<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SpeakersController extends Controller
{
    public function viewSpeakers() {
        return view('speakers.index');
    }
}
