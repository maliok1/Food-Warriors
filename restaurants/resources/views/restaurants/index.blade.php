@extends ('layouts.app')

@section('list of restaurants') 
    <h1>Restaurants:</h1>
    @foreach($restaurants as $restaurant)
      <h4>{{$restaurant->name}}</h4>
      <h5>{{$restaurant->city}}</h5>
      @if($restaurant->image)
        <img src="{{$restaurant->image}}" alt="{{$restaurant->name}}"> 
      @endif
     
    @endforeach
@endsection