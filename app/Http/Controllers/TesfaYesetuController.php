<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tesebaki;
use App\Campus;

class TesfaYesetuController extends Controller
{
    public function index(Campus $campus) {
        if(request()->has('search')) {
            $query = request('search');

            $tesfa_yesetu = Tesebaki::whereCampusIdAndType($campus->id,'tesfa_yesete')
                ->where('name',"LIKE", '%'.$query.'%')
                ->paginate(8);
            return $tesfa_yesetu;
        }

        $tesfa_yesetu = Tesebaki::whereCampusIdAndType($campus->id,'tesfa_yesete')->paginate(8);

        if(request()->ajax()) {
            return $tesfa_yesetu;
        }
        
        return view('admin.tesebakis.tesfa_yesetu', [
            'tesfa_yesetu' => $tesfa_yesetu
        ]);
    }
}
