@extends('layouts.app')

@section('content')

    <div class="menu in-left">
       <ul style="list-style-type: none;">
       <li><a href="{{ url('/home') }}"><i class="fas fa-home"></i> Home </a></li>
       <li><a href="{{ url('/search') }}"><i class="fas fa-search"></i> Ricerca </a></li>
       <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
       <i class="fas fa-sign-out-alt"></i> Logout </a></li>
       </ul>
     </div>
     <div class="container-fluid">
         <div class="row justify-content-center">
             <div class="col-sm-10 mt-5 mb-5"> <!-- Set width card && margin top-bottom-->
                <div class="card-header d-flex align-items-center justify-content-center header fade-in">
                    Crea una nuova playlist!
                </div>
                 <div class="card">
                         <form name="crea" id="ricerca" class="fade-in" method="POST" action="{{ route('crea_collection') }}"> <!-- set route crea playlist -->
                            @csrf
                             <p><label id="label"> <input type="text" name="crea" size="40"></label></p>
                             <p>
                                <button type="submit" class="btn btn-success btn-lg" style="width: 50%;">
                                  Crea!
                                </button>
                             </p>
                          </form>
                          <br>
                  <div class="card-header home_title justify-content-center fade-in">
                    <h1 id="title" class="fade-in"> Le tue playlist... </h1>
                        @if (session('message'))
                            <div class="alert alert-danger text-center mx-auto w-25">
                             {{ session('message') }}
                            </div>
                        @endif
                     <div class="card">
                      @foreach ($raccolta as $raccolte)
                       <div class="raccolta" id="{{ $raccolte["id"] }}">
                         <a class="raccolte">
                             <h3>
                             ID: {{ $raccolte["id"] }} -
                             Titolo: {{ $raccolte["Titolo"] }}
                             </h3>
                         </a>
                         <a class="raccolte" id="immagine" href="{{ route('playlist', ['id' => $raccolte['id']]) }}">
                             <img src="{{ $raccolte["UrlImg"] }}">
                         </a>
                       </div>
                      @endforeach
                     </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
