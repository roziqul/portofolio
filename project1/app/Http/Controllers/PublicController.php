<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\Extraculiculer;
use App\Models\Facility;
use App\Models\Headmaster;
use App\Models\History;
use App\Models\Slider;
use App\Models\Teacher;
use App\Models\Utility;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        $teachers = Teacher::take(4)->get();
        $achievements = Achievement::take(4)->orderBy('created_at', 'DESC')->get();
        $extras = Extraculiculer::take(4)->get();
        $headmaster = Headmaster::first();
        $utility = Utility::first();
        $history = History::first();
        $facilities = Facility::all();

        $countStudent = Utility::first('total_student');
        $countClass = Utility::first('total_class');
        $countTeacher = Teacher::count();
        $countExtra = Extraculiculer::count();

        $data = [
            'sliders' => $sliders,
            'teachers' => $teachers,
            'achievements' => $achievements,
            'extras' => $extras,
            'headmaster' => $headmaster,
            'utility' => $utility,
            'history' => $history,
            'facilities' => $facilities,
            'countStudent' => $countStudent->total_student,
            'countClass' => $countClass->total_class,
            'countTeacher' => $countTeacher,
            'countExtra' => $countExtra
        ];

        return view('user-side.homepage', $data);
    }

    public function getHeadmaster()
    {
        $headmaster = Headmaster::first();
        $utility = Utility::first();
        $sliders = Slider::all();

        $data = [
            'headmaster' => $headmaster,
            'utility' => $utility,
            'sliders' => $sliders
        ];

        return view('user-side.headmaster.index', $data);
    }

    public function getExtras()
    {
        $extras = Extraculiculer::all();
        $utility = Utility::first();

        $data = [
            'extras' => $extras,
            'utility' => $utility,
        ];

        return view('user-side.extra.index', $data);
    }
}
