<?php

namespace App\Http\Controllers;

use App\Yesemu;
use Illuminate\Http\Request;
use Auth;
use App\Tesebaki;
use App\User;
use App\Campus;

class AdminController extends Controller
{

    public function index(Campus $campus) {

        $yetekebelu_count = Tesebaki::whereCampusId($campus->id)
            ->whereType('yetekebele')->count();
        $yetemelesu_count = Tesebaki::whereCampusId($campus->id)
            ->whereType('yetemelese')->count();
        $tesfa_yesetu_count = Tesebaki::whereCampusId($campus->id)
            ->whereType('tesfa_yesete')->count();
        // $yesemu_count = Tesebaki::whereCampusId($campus->id)
        //     ->whereType('yesema')->count();

        $yesemu_count = Yesemu::all()->sum('number');

        // dd( [
        //     'yetekebelu_count' => $yetekebelu_count,
        //     'yetemelesu_count' => $yetemelesu_count,
        //     'tesfa_yesetu_count' => $tesfa_yesetu_count,
        //     'yesemu_count' => $yesemu_count,
        // ]);

        // if() {
            return [
                'yetekebelu_count' => $yetekebelu_count,
                'yetemelesu_count' => $yetemelesu_count,
                'tesfa_yesetu_count' => $tesfa_yesetu_count,
                'yesemu_count' => $yesemu_count,
            ];
        // }
    }

    public function home() {
        return view('admin.home');
    }

    public function edit() {
        return view('admin.my-profile', [
            'user' => Auth::user()
        ]);
    }

    public function update(Campus $campus, User $user) {
        request()->validate([
            'avatar' => ['required', 'image']
        ]);

        $image = request('avatar');

        $newName = $user->id.time().".".$image->extension();
        $path = public_path('/images/');

        $image->move($path, $newName);

        $user->avatar = '/images/'.$newName;
        $result = $user->save();

        return [
            'success' => $result
        ];
    }

    public function updateUser() {
        $user = Auth::user();
        $campus = $user->campus;

        request()->validate([
            'name' => ['required'],
            'phone' => ['required', 'unique:users'],
            'email' => ['required', 'unique:users']
        ]);

        $res = $user->update(
            request()->all()
        );

        return [
            'success' => true
        ];

    }
}
