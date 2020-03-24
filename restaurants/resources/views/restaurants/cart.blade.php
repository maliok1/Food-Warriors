@extends ('layouts.app')



@section('cart') 

<h1>Your meal is reserved!</h1>

<a href="{{ URL::previous() }}">Back to the restaurant</a>

@endsection