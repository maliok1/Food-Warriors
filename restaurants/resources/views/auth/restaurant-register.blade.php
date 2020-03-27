@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Restaurant Registration</div>

                <div class="card-body">
                    <form method="POST" action="{{ action ('RestaurantRegistrationController@register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-3 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                            
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-md-3 col-form-label text-md-right">Name of your restaurant </label>

                            <div class="col-md-6">
                                <input  type="text" name="restaurant_name" placeholder="Name of you restaurant" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address_address" class="col-md-3 col-form-label text-md-right">Address</label>
                            <div class="col-md-6">
                                <input type="text" name="restaurant_city" placeholder="City" class="form-control">
                            <br>
                                <input type="text" id="address-input" name="address_address" class="form-control map-input">
                                <br>
                                <input type="hidden" name="address_latitude" id="address-latitude" value="0" class="form-control" />
                                <input type="hidden" name="address_longitude" id="address-longitude" value="0"  class="form-control"/>
                            </div>
                            <div id="address-map-container" style="width:100%;height:400px;" class="col-md-12" >
                                <div style="width: 100%; height: 100%" id="address-map" ></div>
                            </div>
                        </div>

                            <div class="form-group row">
                                <label for="" class="col-md-3 col-form-label text-md-right">Add an image: </label>
                                <div class="col-md-6">
                                    <input type="file" name="image_file">
                                </div>
                            </div>
                            <div class="form-group row">

                                <label for="" class="col-md-3 col-form-label text-md-right">Describe your restaurant</label>
                                <div class="col-md-6">
                                <textarea name="restaurant_description" id="" cols="20" rows="5" ></textarea>
                                </div>
                            </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="button" onclick="location.href='{{ url('/register') }}'" class="btn btn-primary">
                                    {{ __('Back') }}
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  <script src="/js/mapInput.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script>
@stop