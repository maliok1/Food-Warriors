@extends ('layouts.app')

@section('list of restaurants') 

   <!-- Go to your restaurant button-->

<div class="m-4" style="font-family: 'Roboto', sans-serif">
      @auth 
        @foreach($restaurants as $restaurant)
          @if(auth()->user()->id === $restaurant->user_id)
            <a class="m-2 btn btn-dark" href="restaurant/{{$restaurant->id}}">Go to my restaurant</a>
          @endif
        @endforeach 
      @endauth

    <!-- List of restaurants -->

      <h1 class="m-2">Restaurants</h1>
        <hr>
          @foreach($restaurants as $restaurant)
            <div class="d-inline-flex m-2">
              <div class="align-self-center">
                <div class="card" style="width: 20rem; border-radius: 15px">
                  @if($restaurant->image)
                    <img class="card-img-top" style="border-radius: 15px" src="{{$restaurant->image}}" alt="{{$restaurant->name}}">
                  @endif
                <div class="card-body">
                  <a href="/restaurant/{{$restaurant->id}}"><h2>{{$restaurant->name}}</h2></a>
                  <h5 class="card-title">{{$restaurant->city}}</h5>
                  <p class="card-text"></p>
                </div>
              </div>
            </div>
          </div>
        @endforeach
    @endsection
</div>

{{-- for overlaping 
<div class="card-img-overlay">
<h4 class="card-title">John Doe</h4>
<p class="card-text">Some example text.</p> --}}
