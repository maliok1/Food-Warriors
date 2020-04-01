@extends ('layouts.app')

@section('restaurant detailed')

    <img class="img-fluid" style="margin-top:-24px; width: 100vw; height: 22rem; object-fit: cover" src="{{$restaurant->image}}" alt="{{$restaurant->name}}" > 
  <div class=" restaurant-title">
    <h2>{{$restaurant->name}}</h2>
    <h3>{{$restaurant->city}}</h3>
    <p>{{$restaurant->description}}</p>
 </div>
<!-- A form for to create a meal -->
    
    @auth
    
    @if(auth()->user()->id === $restaurant->user_id)
    <hr>
    
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
          <input type="submit" value="submit"  class="button-style">
        </div>
      </form>
</div>
      @if($errors->any())
        <div class="alert alert-danger">
          @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
          @endforeach
          <hr>
        </div>
      @endif
    @endif  
  @endauth
   

<!-- Display Meals -->

  <h2 class="ml-5 mt-4 mb-4">Meals available today</h2> 
  
  <div class="con">
    @foreach($restaurant->meals as $meal)
    <div class="d-inline-flex" style="margin: 1.5%">
        <div class="card" style="width: 25rem; height: 45rem; border-radius: 10%; box-shadow: 2px 2px 5px grey;">
          @if($meal->image)
          <img  class="card-img-top" style="width: 25rem; height: 20rem; content-fit: cover; border-radius: 10%" src="{{$meal->image}}" alt="{{$meal->name}}"> 
          @endif
        <div class="card-body">
          <h3 class="card-title">{{$meal->name}}</h3>
          <p class="m-1">{{$meal->description}}</p>
          <hr style="margin: 0"> 
          <p class="m-1 mt-2">Price: {{$meal->price}} CZK</p>  
          <p class="m-1">Left: {{$meal->quantity}}</p>
          <p class="m-1 mb-3">Pick-up time: {{ date('H:i',strtotime( $meal->pickup_time_start)) }} - {{ date('H:i',strtotime( $meal->pickup_time_end)) }}</p>

  @auth

<!-- Display an allergen -->
    <h5 class="m-1">Allergens:</h5>
      @foreach($meal->allergens as $allergen)
        <li class="m-1">{{$allergen->name}}</li>

<!-- remove an allergen -->
        @if(auth()->user()->id === $restaurant->user_id)
          <form class="m-1" form action="{{action ('AllergenController@removeAllergen', $meal->id)}}" method="get">
            @csrf 
            <input class="m-1 button-style" type="submit" value="delete allergen">
            <input class="m-1" type="hidden" name="allergen" value={{$allergen->id}}> 
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
          <input class="mt-2 button-style" type="submit" value="submit allergen">
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
          <input class="mt-2 button-style" type="submit" value="delete meal">
        </form>
      @endif

  <!-- Reserve a meal -> user -->
  
      @if(auth()->user()->id !== $restaurant->user_id)
        <form action="{{action ('MealController@cart', $meal->id)}}" method="post">
          @csrf 
          <input class="button-style btn2" type="submit" value="Reserve meal">
        </form>
      @endif
    @endauth   

    <!-- Reserve a meal -> log in -->
        @guest
          <a class="button-style btn2" href="/login">Reserve meal</a>
        @endguest
      </div>
    </div>
  </div>
  @endforeach

</div> 
  <hr>

<!-- Comments display -->
<div class="comment-section">

   <h3 class="mb-5 comments-title">Comments:</h3>
    @foreach($restaurant->comments as $comment)
      
      <div class="comment-head"> 
        
      <img class="user-img" src="{{$comment->user->image}}" />

        <span class="head-of-comment"><span class="comment-name">{{$comment->user->name}}</span></span>
      </div> 
      <div class="comment-body"> 
        <p >{{$comment->comment}}</p> 
      </div>
      <hr class="hr">
      <span class="ml-3 comment-time pull-right">{{$comment->created_at}}</span>
        

<!-- Reply display -->
  <div class="display-reply-comment">
      @if($comment->comment_reply !== null)
       <div class="comment-head">
        <span>Reply from
        <span class="comment-name">{{$comment->restaurant->name}}</span>
         <span class="ml-3 comment-time ">{{$comment->created_at}}</span>
        </span>
       </div>
       <div class="comment-body">
         <p >{{$comment->comment_reply->reply}}</p>   
         <hr class="hr2">
       </div> 
      @endif
  </div>
          
<!--Delete a comment  -->
    @auth
    <div class="ml-5">
        @if($comment->user_id === Auth::user()->id)
          <form action="{{ action('CommentsController@deleteComment', $comment->id) }}" method="post">
            @method('delete')
            @csrf
            <input class="button-style deleteBTN" type="submit" value="delete comment">
          </form>
        @endif
      </div>
    @endauth  
    
<!-- Reply to a comment-->
  @auth
    <div class="reply-comment">
      @if(auth()->user()->id === $restaurant->user_id)
      <form action="{{ action ('CommentReplyController@store' , $comment->id )}}" method="post">
      @csrf
        <textarea class="form-comment" type="text" id="" name="reply"></textarea>
        <input class=" mt-2 button-style submitBTN" type="submit" value="reply">
      </form>
      @endif
    </div> 
  @endauth    
  @endforeach

<!-- Leave a comment -->
   @auth  
   @if(auth()->user()->id !== $restaurant->user_id)
    <div>
      <div class="reply-comment ">
      <form action="{{action ('CommentsController@store', $restaurant->id) }}" method="post">
        @csrf
        <h4 style="margin: 5%">Leave your comment</h4>
        <textarea class="form-comment" name="comment" id=""></textarea>
        <input class="mt-2 button-style submitBTN" type="submit" value="submit">
      
      </form> 
    </div>
  </div>
    @endif
   @endauth

<!-- Log-in section -->
      @guest
        <div class="login-to-comment">
          <h3>Please <a href="{{ route('login') }}">login</a> to leave a comment!</h3>
        </div>
      @endguest
     </div>
 
  @endsection
