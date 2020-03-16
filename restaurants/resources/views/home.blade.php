@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{Auth::user()->name}} is logged in!
                    @if(Auth::user()->restaurant !== null)
                        You are a manager of {{Auth::user()->restaurant->name}}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
