@extends('layouts.app')

@section('content')

    <div class="menu in-left">
        <ul style="list-style-type:none;">
            <li><a href="{{ url('/home') }}"><i class="fas fa-home"></i> Home </a></li>
            <li><a href="{{ url('/search') }}"><i class="fas fa-search"></i> Ricerca</a></li>
            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt">
                </i> Logout</a>
            </li>
        </ul>
    </div>
    <div class="container-fluid fade-in">
        <div class="row justify-content-center">
            <div class="col-sm-10 mt-5 mb-5"> <!-- Set width card && margin top-bottom-->
                <article>
                    <h1 id="title"> Playlist </h1>
                    @foreach ($contenuti as $all_contenuti)
                      @for($i = 0; $i < count($all_contenuti); $i++)
                      <div class="raccolta" id="">
                        <div class="card w-100">
                        <div class="card-header w-100 border-bottom-0">
                        <div class="card float-left">
                          <h2>
                              Brano: {{ $all_contenuti[$i]['Track_name'] }}
                          </h2>
                          <h4 class="hidden" id="album" style="display: none;">
                            Album: {{ $all_contenuti[$i]['album'] }}
                          </h4>
                          <h4 class="hidden" id="artista" style="display: none;">
                            Artista: {{ $all_contenuti[$i]['artista'] }}
                          </h4>
                        </div>
                        <img id="image" class="float-right w-40" src="{{ $all_contenuti[$i]['UrlImg'] }}">
                        </div>
                        </div>
                        <div class="button" style="width: 100%; text-align: right; padding-right: 6.5%;">
                        <a href="{{ route('delete',  ['raccolta' => $all_contenuti[$i]['Raccolte_id'], 'track' => $all_contenuti[$i]['Track_id']]) }}">
                            <button class="btn btn-danger btn-lg">
                                Elimina
                            </button>
                        </a>
                    </div>
                      </div>
                      @endfor
                    @endforeach
                </article>

            </div>
        </div>
    </div>
@endsection
