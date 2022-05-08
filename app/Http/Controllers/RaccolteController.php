<?php

namespace App\Http\Controllers;

use App\Raccolte;
use App\Contenuti;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;

class RaccolteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request) {
        //Creazione raccolte
        $this->validate($request, ['crea' => ['required', 'string', 'max:255']]);
        Raccolte::create(['Titolo' => $request->input('crea'), 'User_id' => Auth::user()->id, 'UrlImg' => "../public/css/image.png"]);
        return redirect('/home');
    }

    public function playlist() {
        $id = $_GET['id'];
        $raccolta = Raccolte::raw('id')->where('id', $id)->Where('User_id', Auth::user()->id)->get();
        $playlist = json_decode($raccolta, true);

        if($playlist) {
            $contenuti = Contenuti::where('Raccolte_id', $id)->get();
            $track[] = json_decode($contenuti, true);
            return view('collection')->with('contenuti',$track);
        }
        else{
            return redirect('/home')->with('message','Accesso negato!');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Raccolte  $raccolte
     * @return \Illuminate\Http\Response
     */
    public function show(Raccolte $raccolte)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Raccolte  $raccolte
     * @return \Illuminate\Http\Response
     */
    public function edit(Raccolte $raccolte)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Raccolte  $raccolte
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Raccolte $raccolte)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Raccolte  $raccolte
     * @return \Illuminate\Http\Response
     */
    public function destroy(Raccolte $raccolte)
    {
        //
    }
}
