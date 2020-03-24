@extends('layouts.app')

@section('restaurant detailed')
  <h2>{{$restaurant->name}}</h2> 
  <img src="{{$restaurant->image}}" alt="{{$restaurant->name}}"> 
   <p>{{$restaurant->city}}</p>
   <p>{{$restaurant->description}}</p>

<!-- A form for to create a meal -->
    <hr>
    @auth
    @if(auth()->user()->id === $restaurant->user_id)
      <form action="{{ action ('MealController@storeMeal' , $restaurant->id )}}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="">Name of the package</label>
        <input type="text" name="name">
        <label for="">Describe your package</label>
        <input type="text" name="description">
        <label for="">Image</label><br>
        <input type="file" name="image_file">
        <label for="">Price</label>
        <input type="number" name="price">
        <label for="">Pick-up from</label>
        <input type="time" name="pickup_time_start">
        <label for="">to</label>
        <input type="time" name="pickup_time_end">
        <input type="submit" value="submit">
      </form>

      @if($errors->any())
          <div class="alert alert-danger">
              @foreach($errors->all() as $error)
                  <p>{{ $error }}</p>
              @endforeach
          </div>
      @endif
      @endif  
    @endauth
   <hr>

<!-- Display Meals -->
<h3>Meals available today</h3> 
  @foreach($restaurant->meals as $meal)
    <h4>{{$meal->name}}</h4>
    <p>{{$meal->description}}</p>
    @if($meal->image)
        <img src="{{$meal->image}}" alt="{{$meal->name}}"> 
    @endif
    <h5>Price</h5>
    <p>{{$meal->price}} CZK</p>
    <h5>Pick-up time</h5>
    <p>{{ date('H:i',strtotime( $meal->pickup_time_start)) }} - {{ date('H:i',strtotime( $meal->pickup_time_end)) }}</p>
@auth

<!-- Display an allergen -->
    <h5>Allergens:</h5>
    @foreach($meal->allergens as $allergen)
      <li>{{$allergen->name}}</li>

<!-- remove an allergen -->
      <form action="{{action ('AllergenController@removeAllergen', $meal->id)}}" method="get">
        @csrf 
        <input type="submit" value="delete allergen">
        <input type="hidden" name="allergen" value={{$allergen->id}}> 
      </form>
    @endforeach
    
    <p>{{$meal->pickup_time}}</p>

<!-- Add an allergen -->
    @if(auth()->user()->id === $restaurant->user_id)
      <form action="{{action('AllergenController@addAllergen' , $meal->id)}}" method="post">
        @csrf
        <select name="allergen">
          @foreach($allergens as $allergen)
            <option value="{{$allergen->id}}">{{$allergen->name}}</option>
          @endforeach
          <input type="submit" value="submit allergen">
        </select>
      </form>

<<<<<<< HEAD
      <!-- <div id="map"></div>
=======
      <div id="map">
>>>>>>> michaela
    <script>
      function initMap() {
          const position = {lat: 50.092282, lng: 14.497125}; // there we should provide location from DB (so it means when a restaurant is registering they should input LAT and LNG) or some idea how to do it eaisier?
          const opt = {
              center: position,
              zoom: 17,
          };
          const map = new google.maps.Map(document.getElementById("map"), opt);


          const marker = new google.maps.Marker({
          position: position,
          map: map,
          title: 'Name of Restaurant'
          });

          const info = new google.maps.InfoWindow({
              content: 'Some information about restaurant'
          });

          marker.addListener("click", function() {
              info.open(map, marker);
          });
      }
  </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCHvKCIIB8pZZY5IGb9huLHrxD1gyo7z9Q&callback=initMap"
<<<<<<< HEAD
  type="text/javascript"></script> -->
      

=======
  type="text/javascript"></script>
      </div>
  
>>>>>>> michaela
    <!--Delete a meal  --> 
   
      
        <form action="{{ action('MealController@deleteMeal', $meal->id) }}" method="post">
          @method('delete')
          @csrf
          <input type="submit" value="delete">
        </form>
        @endif

    <!-- Reserve a meal -->
      @if(auth()->user()->id !== $restaurant->user_id)
        <form method="get" action="">
          @csrf
          <button>Reserve</button>
        </form> 
      @endif
@endauth   

    <!-- Reserve a meal -> log in -->
        @guest
          <form method="get" action="{{ route('login')}}">
            @csrf
              <button>Reserve</button>
          </form>  
        @endguest
  <hr>

  @endforeach
  
  <hr>

<!-- Comments display -->
   <h3>Comments:</h3>
   @foreach($restaurant->comments as $comment)
    <hr>   Comment:
      <p>{{$comment->comment}}</p> 
      <p> By {{$comment->user->name}}</p>
      Created at: <br>
      <p>{{$comment->created_at}}</p>
<!-- Reply display -->
      @if($comment->comment_reply !== null)
       <strong>Reply from restaurant:</strong><br>
       <p>{{$comment->comment_reply->reply}}</p> 
      @endif
    
<!-- Reply to a commnet-->
  @auth
      @if(auth()->user()->id === $restaurant->user_id)
      <form action="{{ action ('CommentReplyController@store' , $comment->id )}}" method="post">
      @csrf
        <textarea name="reply" id="" cols="10" rows="2"></textarea>
        <input type="submit" value="reply">
      </form>
      @endif
   @endauth  
<!--Delete a comment  -->
  @auth
      @if($comment->user_id === Auth::user()->id)
      <form action="{{ action('CommentsController@deleteComment', $comment->id) }}" method="post">
        @method('delete')
        @csrf
        <input type="submit" value="delete">
      </form>
      @endif
      <hr>
  @endauth    
    @endforeach
<!-- Leave a comment -->
   @auth
      <form action="{{action ('CommentsController@store', $restaurant->id) }}" method="post">
      @csrf
      <h4>Leave your comment</h4>
      <textarea name="comment" id="" cols="30" rows="10"></textarea>
      <input type="submit" value="save">
    </form>
   @endauth
<!-- Log-in section -->
    @guest
        <h2>Please <a href="{{ route('login') }}">login</a> to leave a comment</h2>
    @endguest
@endsection