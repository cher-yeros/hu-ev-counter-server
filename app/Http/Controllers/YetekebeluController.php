<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tesebaki;
use App\Campus;

class YetekebeluController extends Controller
{
    public function index(Campus $campus) {
        if(request()->has('search')) {
            $query = request('search');

            $yetekebelu = Tesebaki::whereCampusIdAndType($campus->id,'yetekebele')
                ->where('name',"LIKE", '%'.$query.'%')
                ->paginate(8);
            return $yetekebelu;
        }

        $yetekebelu = Tesebaki::whereCampusIdAndType($campus->id,'yetekebele')->paginate(8);

        if(request()->ajax()) {
            return $yetekebelu;
        }

        return view('admin.tesebakis.yetekebelu', [
            'yetekebelu' => $yetekebelu
        ]);
    }
}
