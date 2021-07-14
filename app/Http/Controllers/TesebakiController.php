<?php

namespace App\Http\Controllers;

use App\Yesemu;
use Illuminate\Http\Request;
use App\Tesebaki;
use App\Campus;
use function GuzzleHttp\Psr7\_parse_request_uri;

class TesebakiController extends Controller
{
    public function index(Campus $campus) {
        // dd(now()->format('Y'));
        if(request('timely') == 'M') {
            return Tesebaki::where('created_at','LIKE',now()->format('Y').'%')
                    ->whereCampusId($campus->id)->get()
                    ->groupBy([function($tesebaki) {
                        return $tesebaki->created_at->format(request('timely'));
                    }, 'type']);
        }
        else if(request('timely') == 'D') {
            // dd(now()->format('Y-m'));
            return Tesebaki::where('created_at','LIKE',now()->format('Y-m').'%')
                    ->whereCampusId($campus->id)->get()
                    ->groupBy([function($tesebaki) {
                        return $tesebaki->created_at->format(request('timely'));
                    }, 'type',]);
        }
        return Tesebaki::whereCampusId($campus->id)->get()->groupBy([function($tesebaki) {
            return $tesebaki->created_at->format(request('timely'));
        }, 'type']);

        return $data;

        return [
            'dates' => $dates,
            'data' => $data
        ];
    }

    public function yesemu() {
        if (\request()->ajax()){
            return response()->json(Yesemu::all());
        }

    }
}
