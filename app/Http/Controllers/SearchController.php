<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Raccolte;
use App\Contenuti;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
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
        return view('search');
    }

    public function cerca (Request $request) {
        $this->validate($request, ['cerca' => ['required', 'string', 'max:255']]);
        $client_id = "";
        $client_secret = "";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://accounts.spotify.com/api/token");
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
        $headers = array("Authorization: Basic ".base64_encode($client_id.":".$client_secret));
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);
        $token = json_decode($result)->access_token; //token request
        $testo = $request->input('cerca');
        $data = http_build_query(array("q" => "$testo", "type" => "track", "limit" => "6"));
        $curl = curl_init();
        curl_setopt($curl,CURLOPT_URL,"https://api.spotify.com/v1/search?".$data);
        $headers = array("Authorization: Bearer ".$token);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);

        $result_decoded = json_decode($result, true);
        return view('findContents')->with("research", $result_decoded['tracks']['items']);
    }

    public function add (Request $request) {
        $this->validate($request, [
            'raccolta' => ['required', 'string', 'max:255'],
            'nome' => ['required', 'string', 'max:255'],
            'spotify_id' => ['required', 'string', 'max:255'],
            'album' => ['required', 'string', 'max:255'],
            'artista' => ['required', 'string', 'max:255'],
            'img' => ['required', 'string', 'max:255']
        ]);

        $rac = $request->input('raccolta');
        $raccolta = Raccolte::raw('id')->where('Titolo', $rac)->Where('User_id',Auth::user()->id)->get();
        $playlist = json_decode($raccolta, true);

        if($playlist) {
            $id = $playlist['0']['id'];

            $checkContent = Contenuti::raw('Track_id')->where('Raccolte_id', $id)->where('Track_id',$request->input('spotify_id'))->get();
            $error = json_decode($checkContent, true);
            if($error){
                return redirect('/cerca')->with('msg','Brano già presente nella playlist.');
            }

            $contents = Contenuti::create([
                'Raccolte_id' => $id,
                'Track_id' => $request->input('spotify_id'),
                'Track_name' => $request->input('nome'),
                'artista' => $request->input('artista'),
                'album' => $request->input('album'),
                'UrlImg' => $request->input('img')
            ]);
            Raccolte::where('id', $id)->update(['UrlImg' => $request->input('img')]);
            return redirect('/cerca')->with('message','Inserimento avvenuto con successo!');
        } else  {
            return redirect('/cerca')->with('messg','Raccolta inesistente...');
        }
    }
}
