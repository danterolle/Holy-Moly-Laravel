@extends('search')

@section('findContents')

@foreach ($research as $researchs)
<div class="card-header container bg-success">
    <div class="card">
    <div class="card-header">
    <div class="card float-left">
      <p class="p_found">
          Nome: <a id="nome" name="nome"> {{ $researchs['name'] }} </a>
      </p>
      <p class="p_found">
          ID: <a id="ID"> {{ $researchs['id'] }} </a>
      </p>
      <p class="p_found">
          Album: <a id="Album"> {{ $researchs['album']['name'] }} </a>
      </p>
      <p class="p_found">
          Artista: <a id="Artista"> {{ $researchs['artists']['0']['name'] }} </a>
      </p>
    </div>
      <img id="image" class="float-right" src="{{ $researchs['album']['images']['0']['url'] }}">
    </div>
    </div>
</div>
@endforeach

@endsection
