<?php

namespace App\Http\Controllers;

use App\Yesemu;
use Illuminate\Http\Request;
use App\Tesebaki;
use App\Campus;

class YesemuController extends Controller
{
    public function index(Campus $campus) {
        if(request()->has('search')) {
            $query = request('search');

            $yesemu = Tesebaki::whereCampusIdAndType($campus->id,'yesema')
                ->where('name',"LIKE", '%'.$query.'%')
                ->paginate(8);
            return $yesemu;
        }

//        $yesemu = Tesebaki::whereCampusIdAndType($campus->id,'yesema')->paginate(8);
        $yesemu = Yesemu::all();

        if(request()->ajax()) {
            return $yesemu->all();
        }

//        dd($yesemu->all());

        return view('admin.tesebakis.yesemu', [
            'yesemu' => $yesemu->all()
        ]);
    }
}
