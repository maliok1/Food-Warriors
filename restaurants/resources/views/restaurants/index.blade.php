@extends ('layouts.app')



@section('list of restaurants') 

   <!-- Go to your restaurant button-->
  
    @if(auth()->user()->id !== $restaurant->user_id)
    <a href="">Go to my restaurant</a>
    
    @endif
 

    <h1>Restaurants:</h1>

    @foreach($restaurants as $restaurant)
      <a href="/restaurant/{{$restaurant->id}}">{{$restaurant->name}}</a>
      <h5>{{$restaurant->city}}</h5>
      @if($restaurant->image)
        <img src="{{$restaurant->image}}" alt="{{$restaurant->name}}"> 
      @endif
     
    @endforeach
@endsection

