@extends ('layouts.app')

@section('user page') 
    {{$user->name}}
    {{dd($user)}}
@endsection