<?php

namespace App\Http\Controllers;

//librerie di supporto
use Illuminate\Http\Request;
use App\Raccolte;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $raccolta = Raccolte::all()->toArray(); //Prende tutti i risultati della raccolta
        return view('home')->with("raccolta", $raccolta); //with = riferimento alla raccolta

        // Se volessi mostrare SOLO le raccolte di un determinato utente:
        // $raccolta = Raccolte::where('User_id', Auth::user()->id)->get();
    }
}
