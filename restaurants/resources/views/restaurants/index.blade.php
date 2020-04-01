@extends ('layouts.app')

@section('list of restaurants') 

   <!-- Go to your restaurant button-->


      @auth 
        @foreach($restaurants as $restaurant)
          @if(auth()->user()->id === $restaurant->user_id)
            <a class="mr-5 pull-right btn btn-dark" href="restaurant/{{$restaurant->id}}">Go to my restaurant</a>
          @endif
        @endforeach 
      @endauth

    <!-- List of restaurants -->

      <h1 class="ml-5">Restaurants</h1>
        <hr>
        <div class="restaurants">
          @foreach($restaurants as $restaurant)
            <div class="d-inline-flex m-3">
              <div class="cards">
                  @if($restaurant->image)
                    <img src="{{$restaurant->image}}" alt="{{$restaurant->name}}">
                  @endif
                    <div class="restaurant-body-card">
                    <a href="/restaurant/{{$restaurant->id}}"><h2>{{$restaurant->name}}</h2></a>
                    <h5 class="card-title">{{$restaurant->city}}</h5>
                  </div>
                 
               </div>
             
              </div>
            @endforeach
       </div>  
    @endsection



{{-- for overlaping 
<div class="card-img-overlay">
<h4 class="card-title">John Doe</h4>
<p class="card-text">Some example text.</p> --}}
