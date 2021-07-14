<?php

namespace App\Http\Controllers;

use App\Evange;
use Illuminate\Http\Request;

class EvangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $evange = Evange::latest()->first();

        return response()->json([
            'evange' => $evange,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//        dd($request->messege);
//        $res = Evange::create($request);

        $ev = new Evange();
        $ev->started = $request->started;
        $ev->messege = $request->messege;
        $ev->campus_id = $request->campus_id;
        $ev->user_id = $request->user_id;


        return $ev->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Evange  $evange
     * @return \Illuminate\Http\Response
     */
    public function show(Evange $evange)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Evange  $evange
     * @return \Illuminate\Http\Response
     */
    public function edit(Evange $evange)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Evange  $evange
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evange $evange)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Evange  $evange
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evange $evange)
    {
        //
    }
}
