@extends ('layouts.app')

@section('list of restaurants') 
    <h1>Restaurants:</h1>
    @foreach($restaurants as $restaurant)
      <a href="/restaurant/{{$restaurant->id}}">{{$restaurant->name}}</a>
      <h5>{{$restaurant->city}}</h5>
    @endforeach
@endsection

