@extends ('layouts.app')

@section('restaurants search results')
  <div class="search-results">
      @if(isset($details))
          <p> The Search results for your query <b> {{ $query }} </b> are :</p>
      <h2>Restaurants you have been searching for:</h2>
      <table class="search-results-table">
              @foreach($details as $restaurant)
                  <a class="search-result-name" href="/restaurant/{{$restaurant->id}}">{{$restaurant->name}}</a>

                  <img class="search-result-img" src="{{$restaurant->image}}" alt="{{$restaurant->name}}">
              @endforeach
          </tbody>
      </table>
      @endif
  </div>
@endsection