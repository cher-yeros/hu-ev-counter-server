<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Yesemu;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Sebaki;
use App\Tesebaki;
use App\Activity;

class SebakiController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'campus_id' => 'required',
            'name' => 'required',
            'phone' => ['required', 'unique:sebakis'],
            'username' => ['required','unique:sebakis','min:5'],
            'password' => ['required']
        ]);

        $sebaki = Sebaki::create([
            'campus_id' => request('campus_id'),
            'name' => request('name'),
            'phone' => request('phone'),
            'username' => request('username'),
            'password' => Hash::make(request('password'))
        ]);

        $resa = Activity::addActivity('',$sebaki, 'registered_sebaki');

        if(request()->expectsJson()) {
            return [
                'success' => true,
                'sebaki' => $sebaki->load('campus')
            ];
        }

    }

    public function login() {
        $sebaki = Sebaki::whereUsername(request('username'));

        if($sebaki->exists()) {
            if(Hash::check(request('password'), $sebaki->first()->password)) {
                Activity::addActivity('',$sebaki->first(), 'loggedIn_at');
                return [
                    'success' => $sebaki->exists(),
                    'sebaki' => $sebaki->first()
                ];
            }
            else {
                return [
                    'success' => false,
                    'error' => 'Incorrect Password'
                ];
            }
        }
        else {
            return [
                'success' => false,
                'error' => 'You did not register'
            ];
        }

    }

    public function addTesebaki() {
        $sebaki = Sebaki::whereId(request('sebaki_id'));

        if($sebaki->exists()) {
            if(!$sebaki->first()->approved) {
                return response()->json(
                    [
                    'success' => false,
                    'error' => 'You are not approved'
                    ]
                ) ;
            }
        }

        request()->validate([
            'sebaki_id' => ['required','exists:sebakis,id'],
            'campus_id' => ['required','exists:campuses,id'],
            'type' => ['required','typed']
        ]);

        $tese = Tesebaki::create([
            'campus_id' => request('campus_id'),
            'sebaki_id' => request('sebaki_id'),
            'name' => request('name') ?? '',
            'phone' => request('phone') ?? '',
            'gender' => request('gender'),
            'type' => request('type')
        ]);

        // dd(get_class($tese));

        $resa = Activity::addActivity($sebaki->first(),$tese, 'added_tesebaki');

        return [
            'success' => $tese? true : false,
        ];
    }

    public function refreshAccount(Sebaki $sebaki) {
        return [
            'sebaki' => $sebaki
        ]
        ;

        return $sebaki;
    }

    public function update(Sebaki $sebaki) {
        request()->validate([
            'phone' => [ 'unique:sebakis'],
            'username' => ['unique:sebakis'],
        ]);

        $sebaki->update(request()->all());

        Activity::addActivity('',$sebaki, 'updated_sebaki');

        return $sebaki;
    }

    public function updatePassword(Sebaki $sebaki) {
        $sebaki = Sebaki::whereUsername(request('username'));

        if(Hash::check(request('cur_pwd'), $sebaki->first()->password)) {
            $res = $sebaki->update([
                'password' => Hash::make(request('new_pwd'))
            ]);

            // $res = $sebaki->password
            Activity::addActivity('',$sebaki->first(), 'password_updated');

            return [
                'success' => $res? true : false,
            ];
        }
        else {
            return [
                'success' => false,
                'error' => 'Current password is incorrect!'
            ];
        }
    }

    public function addYesema(Request $request) {
        // dd(json_decode($request->getContent(), true));

        $n = $request->number;

        $yesemu = new Yesemu();
        $yesemu->sebakiId = $request->sebakiId;
        $yesemu->campusId = $request->campusId;
        $yesemu->number = $request->number;
        $yesemu->save();

//        for ($i=0; $i < $n; $i++) {
//            $tesebaki = new Tesebaki();
//            $tesebaki->sebaki_id = $request->sebakiId;
//            $tesebaki->campus_id = $request->campusId;
//            $tesebaki->type = "yesema";
//            $tesebaki->gender = null;
//
//            $tesebaki->save();
//        }
        return [
            "success" => true
        ];
    }

    public function updateAvatar(Sebaki $sebaki) {

    }
}
