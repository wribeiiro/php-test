<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LecturesController extends Controller
{
    public function viewLectures() {
        return view('lectures.index');
    }
}
