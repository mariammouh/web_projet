@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Your information') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{route('profile_save',Auth::user()->id)}}">
                          
                            @csrf
                            <img class="profile" src="{{ !empty($user_profile->pic)?$user_profile->pic:"/img/profile.png" }}" alt="{{ !empty($user_profile->pic)?$user_profile->pic:"Uplaod your pic" }}">
                            <br />     <input type="file" name="file" accept="image/*"><br />
                            <label for="address">Your address :</label>
                            <input type="text"  id="address" name="address" value="{{(!empty($user_profile->address))?$user_profile->address:""}}" placeholder="{{(!empty($user_profile->address))?$user_profile->address:"enter your address"}}"><br />
                            <label for="phone">Your phone :</label>
                            <input type="tel"  id="phone" name="phone" placeholder="{{(!empty($user_profile->phone))?$user_profile->phone:"enter your phone"}}" value="{{(!empty($user_profile->phone))?$user_profile->phone:""}}" ><br />
                            <label for="Bio">Your bio :</label>
                            <textarea   id="bio" name="bio" >{{(!empty($user_profile->address))?$user_profile->bio:"enter your bio"}}
                            </textarea><br />
                            <button type="submit" class="action" >Save</button> </form>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    