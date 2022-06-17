@extends('layout.layout')
@section('content')
  <div class="container">
      <div class="row">
        @if(session('message'))
          <div class="alert alert-danger">
            {{session('message')}}
          </div>
        @endif
      </div>
  </div>
    <div class="container">
        <div class="row">
            @forelse ($comics as $comic)
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{$comic->thumb}}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">{{$comic->title}}</h5>
                  <p class="card-text">{{$comic->description}}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>price :</strong>{{$comic->price}}</li>
                    <li class="list-group-item"><strong>series :</strong>{{$comic->series}}</li>
                    <li class="list-group-item"><strong>sale date :</strong>{{$comic->sale_date}}</li>
                    <li class="list-group-item"><strong>type :</strong>{{$comic->type}}</li>
                  </ul>
                  <div class="card-body">
                    <a href=" {{route('comics.show', $comic->id)}} " class="card-link">Explore</a>
                    <a href="{{route('comics.edit', $comic->id)}}" class="card-link">Modify</a>
                    <form action="{{route('comics.destroy', $comic->id)}}" method="POST">
                      @csrf
                      @method('DELETE')
                    <button class="btn btn-danger mt-2">Delete Comic</button>
                  </form>
                  </div>
              </div>
            @empty
                <h3>error</h3>
            @endforelse
        </div>
    </div>
@endsection
