<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tesebaki;
use App\Campus;

class YetemelesuController extends Controller
{
    public function index(Campus $campus) {
        // dd($campus);
        if(request()->has('search')) {
            $query = request('search');

            $yetemelesu = Tesebaki::whereCampusIdAndType($campus->id,'yetemelese')
                ->where('name',"LIKE", '%'.$query.'%')
                // ->get();
                ->paginate(8);
            return $yetemelesu;
        }

        $yetemelesu = Tesebaki::whereCampusIdAndType($campus->id,'yetemelese')
        // ->get();
        ->paginate(8);

        // dd($yetemelesu->pluck('campus_id'));

        if(request()->ajax()) {
            return $yetemelesu;
        }
        
        return view('admin.tesebakis.yetemelesu', [
            'yetemelesu' => $yetemelesu
        ]);
    }
}
