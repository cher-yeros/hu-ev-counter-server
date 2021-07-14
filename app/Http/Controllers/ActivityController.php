<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;

class ActivityController extends Controller
{
    public function index() {
        $activities = Activity::all()->sortBy('action');
        // ->groupBy(function($date){
        //     return $date.'';
        // });

        $activity = $activities->first();

        return view('admin.activity', compact('activities'));
    }

    
}
