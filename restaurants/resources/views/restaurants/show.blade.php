@extends ('layouts.app')

@section('restaurant detailed')
  <h2 >{{$restaurant->name}}</h2> 
 
  <img  class="img-fluid" style="width: 100vw; height: 30rem; object-fit: cover" src="{{$restaurant->image}}" alt="{{$restaurant->name}}" > 
    
    <h2>{{$restaurant->city}}</h2>
    <p>{{$restaurant->description}}</p>
<!-- A form for to create a meal -->
    
    @auth
    
    @if(auth()->user()->id === $restaurant->user_id)
    <hr>
    <div class="card-body">
      <form class= "meal-form" action="{{ action ('MealController@storeMeal' , $restaurant->id )}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group row ">
          <label for=""  class="col-md-2 col-form-label text-md-right">Name of the package</label>
          <div class="col-md-4">
            <input type="text" name="name" class="form-controll">
          </div>
          <label for=""  class="col-md-2 col-form-label text-md-right">Describe your package</label>
          <div class="col-md-4">
            <input type="text" name="description"  class="form-controll">
          </div>
        </div>
        <div class="form-group row ">
          <label for=""  class="col-md-2 col-form-label text-md-right">Image</label><br>
          <div class="col-md-4">
            <input type="file" name="image_file"  class="form-controll">
          </div>
          <label for=""  class="col-md-2 col-form-label text-md-right">Price</label>
          <div class="col-md-4">
            <input type="number" name="price"  class="form-controll">
          </div>
        </div>
                
        <div class="form-group row ">
         
          <label for=""  class="col-md-2 col-form-label text-md-right">Pick-up from</label>
          <div class="col-md-4">
            <input type="time" name="pickup_time_start"  class="form-controll">
          </div>
          <label for=""  class="col-md-2 col-form-label text-md-right">to</label>
          <div class="col-md-4">
           <input type="time" name="pickup_time_end"  class="form-controll">
          </div>
        </div>
        <div class="form-group row ">
        <label for=""  class="col-md-2 col-form-label text-md-right">Quantity</label>
          <div class="col-md-4">
           <input type="number" name="quantity"  class="form-controll">
          </div>
        </div>
        <div class="col-md-12" style="display:flex; justify-content: center">
          <input type="submit" value="submit"  class="btn btn-primary">
        </div>
      </form>
</div>
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

  <h3 class="m-3">Meals available today</h3> 
    @foreach($restaurant->meals as $meal)
      <div class="d-inline-flex">
        <div class="card m-3" style="width: 35rem">
          @if($meal->image)
          <img src="{{$meal->image}}" alt="{{$meal->name}}"> 
          @endif
        <div class="card-body">
          <h3 class="card-title">{{$meal->name}}</h3>
          <p>{{$meal->description}}</p>
          <h5>Price: {{$meal->price}} CZK</h5>   
          <h5>Left: {{$meal->quantity}}</h5>
          <h5>Pick-up time: {{ date('H:i',strtotime( $meal->pickup_time_start)) }} - {{ date('H:i',strtotime( $meal->pickup_time_end)) }}</h5>

@auth

<!-- Display an allergen -->
    <h5>Allergens:</h5>
      @foreach($meal->allergens as $allergen)
        <li>{{$allergen->name}}</li>

<!-- remove an allergen -->
        @if(auth()->user()->id === $restaurant->user_id)
          <form action="{{action ('AllergenController@removeAllergen', $meal->id)}}" method="get">
            @csrf 
            <input type="submit" value="delete allergen">
            <input type="hidden" name="allergen" value={{$allergen->id}}> 
          </form> 
         @endif
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

      <!-- <div id="map"></div>
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
  type="text/javascript"></script> -->

    <!--Delete a meal  --> 
      
        <form action="{{ action('MealController@deleteMeal', $meal->id) }}" method="post">
          @method('delete')
          @csrf
          <input type="submit" value="delete">
        </form>
        @endif

  <!-- Reserve a meal -> user -->
  
      @if(auth()->user()->id !== $restaurant->user_id)
        <form action="{{action ('MealController@cart', $meal->id)}}" method="post">
          @csrf 
          <input type="submit" value="Reserve">
        </form>
      @endif
@endauth   

    <!-- Reserve a meal -> log in -->
        @guest
          <a href="/login">Reserve meal</a>
        @endguest
  
</div>
</div>
</div>
  @endforeach
  
  <hr>

<!-- Comments display -->
   <h3 class="m-3">Comments:</h3>
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