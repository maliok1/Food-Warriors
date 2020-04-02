@extends ('layouts.app')



@section('cart') 
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"><circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/><path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/></svg>

<div class="block">
<h1 class="is">Your meal is reserved!</h1>
<button class="btn btn-restaurant"><a class="back" href="{{ URL::previous() }}">Back to the restaurant</a><i class="material-icons">chevron_right</i></button>
</div>

@endsection