@extends('layouts.app')

@section('content')

    <div class="menu in-left">
        <ul style="list-style-type:none;">
            <li><a href="{{ url('/home') }}"><i class="fas fa-home"></i> Home </a></li>
            <li><a href="{{ url('/search') }}"><i class="fas fa-search"></i> Ricerca</a></li>
            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt">
                </i> Logout</a></li>
        </ul>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-10 mt-5 mb-5"> <!-- Set width card && margin top-bottom -->
                 <div class="card-header text-white d-flex align-items-center justify-content-center header fade-in" style="background-color: green;">
                    Cerca un brano, un artista o un album...
                 </div>
                <div class="card">
                    <form name="search" id="ricerca" class="fade-in" method="POST" action="{{ route('cerca') }}">
                        <!-- Set search method/action -->
                        @csrf
                        <p><label><input type="text" name="cerca" size="40"></label></p>
                        <p><button type = "submit" class="btn btn-success btn-lg" style="width: 50%;">
                            Cerca!
                        </button></p>
                    </form>
                    <!-- New card to show search contents -->
                       <div class="card-header text-white d-flex align-items-center justify-content-center header fade-in" style="background-color: green;">
                          <h4 id="afterSelect" class="hidden" style="margin: 0;"> Inserisci il titolo della playlist in cui vuoi aggiungere il brano selezionato </h4>
                       </div>
                    <div class="card fade-in">
                    <form name="selectPlaylist" id="selezionaRaccolta" class="hidden" method="POST" action="{{ route('add') }}">
                        @csrf
                        <p>
                            <label>
                              <input type="text" name="raccolta" size="40">
                            </label>
                            <input id="found_nome" name="nome" type="hidden" value="">
                            <input id="found_id" name="spotify_id" type="hidden" value="">
                            <input id="found_album" name="album" type="hidden" value="">
                            <input id="found_artista" name="artista" type="hidden" value="">
                            <input id="found_img" name="img" type="hidden" value="">
                        </p>
                         <p>
                          <button type="submit" class="btn btn-success btn-lg" style="width: 40%;">
                            Aggiungi!
                          </button>
                         </p>
                        @if (session('message'))
                          <div class="alert alert-success text-center">
                            {{ session('message') }}
                          </div>
                        @endif
                        @if (session('msg'))
                          <div class="alert alert-warning text-center">
                            {{ session('msg') }}
                          </div>
                        @endif
                        @if (session('messg'))
                          <div class="alert alert-danger text-center">
                            {{ session('messg') }}
                          </div>
                        @endif
                    </form>
                    @yield('findContents')
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
