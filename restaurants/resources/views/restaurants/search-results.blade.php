@extends ('layouts.app')

@section('restaurants search results')
  <div class="search-results">
      @if(isset($details))
          <p> The Search results for your query <b> {{ $query }} </b> are :</p>
      <h2>Restaurants you have been searching for:</h2>
      <table class="search-results-table">
          <thead>
              <tr>
                  <th>Name</th>
                  <th>City</th>
                  <th>Description</th>
              </tr>
          </thead>
          <tbody>
              @foreach($details as $restaurant)
              <tr>
                  <td><a href="/restaurant/{{$restaurant->id}}">{{$restaurant->name}}</a></td>
                  <td>{{$restaurant->city}}</td>
                  <td>{{$restaurant->description}}</td>
                  <td><img class="search-result-img" src="{{$restaurant->image}}" alt="{{$restaurant->name}}"></td>
              </tr>
            
              @endforeach
          </tbody>
      </table>
      @endif
  </div>
@endsection