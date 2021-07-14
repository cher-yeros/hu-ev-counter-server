<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sebaki;
use App\Campus;

class SebakiController extends Controller
{
    public function index(Campus $campus) {
        if(request()->has('search')) {
            $query = request('search');

            $sebakis = Sebaki::whereCampusId($campus->id)->where('name',"LIKE", '%'.$query.'%')
                ->paginate(8);
            return $sebakis;
        }

        $sebakis = Sebaki::whereCampusId($campus->id)->paginate();
        // dd($sebakis);
        if(request()->ajax()) {
            return $sebakis;
        }
        
        return view('admin.sebaki-request', [
            'sebakis' => $sebakis
        ]);
    }

    public function approval(Campus $campus,Sebaki $sebaki) {
        if($sebaki->approved) {
            $sebaki->disApprove();
        }
        else {
            $sebaki->approve();
        }

        if(request()->ajax()) {
            return response([
                'success' => 'true'
            ]);
        }
        
        return back();
    }
}
