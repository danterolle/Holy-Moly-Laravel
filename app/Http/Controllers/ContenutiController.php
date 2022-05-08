<?php

namespace App\Http\Controllers;

use App\Contenuti;
use App\Raccolte;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ContenutiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $id = $_GET['raccolta'];
        $raccolta = Raccolte::raw('id')->where('id', $id)->where('User_id', Auth::user()->id)->get();
        $playlist = json_decode($raccolta, true);

        if($playlist) {
            $contenuti = Contenuti::select()->where('raccolte_id', $id)->get();
            $track [] = json_decode($contenuti, true);
            return view('collection')->with('contenuti', $track);
        }
    }

    public function delete() {
        $raccolta = $_GET['raccolta'];
        $track = $_GET['track'];
        print_r($raccolta);

        $deletePlaylist = Contenuti::where('Raccolte_id', $raccolta)->Where('Track_id', $track)->delete();
        return redirect()->route('collection', ['raccolta' => $raccolta]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contenuti  $contenuti
     * @return \Illuminate\Http\Response
     */
    public function show(Contenuti $contenuti)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contenuti  $contenuti
     * @return \Illuminate\Http\Response
     */
    public function edit(Contenuti $contenuti)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contenuti  $contenuti
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contenuti $contenuti)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contenuti  $contenuti
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contenuti $contenuti)
    {
        //
    }
}
