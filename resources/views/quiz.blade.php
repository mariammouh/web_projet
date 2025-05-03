@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Answer these question please ') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('quiz_save', Auth::user()->id) }}">

                            @csrf
                            <br /> <label for="fav_meal"> What's your favourite meal : <span>{{(!empty($user_quiz)&&$user_quiz[0]!=='null' )? "last time you said ".$user_quiz[0]:""  }}</span></label>
                            <br />       <input type="checkbox" name="fav_meal[]" id="" value="spaguitty">spaguitty
                            <input type="checkbox" name="fav_meal[]" id="" value="tajin">tajin
                            <input type="checkbox" name="fav_meal[]" id="" value="burger">burger
                            <input type="checkbox" name="fav_meal[]" id="" value="pizza">pizza
                            <br /> <label for="fav_meal">What's your favourite music genre : <span>{{!empty($user_quiz)&&($user_quiz[1]!=='null')? "last time you said ".$user_quiz[1]:""  }} </label>
                            <br />
                            <input type="checkbox" name="fav_music_genre[]" value="rap&hiphop" id="">rap&hiphop
                            <input type="checkbox" name="fav_music_genre[]"value="pop&indi" id="">pop&indi
                            <input type="checkbox" name="fav_music_genre[]"value="chaabi" id="">chaabi
                            <input type="checkbox" name="fav_music_genre[]"value="classic" id="">classic

                            <br /> <label for="fav_meal"> What's your favourite season : <span>{{(!empty($user_quiz)&&$user_quiz[2]!=='null')? "last time you said ".$user_quiz[2]:""  }}</label>
<br />
                            <input type="checkbox" name="fav_season[]"value="winter" id="">winter
                            <input type="checkbox" name="fav_season[]"value="spring" id="">spring
                            <input type="checkbox" name="fav_season[]"value="summer" id="">summer
                            <input type="checkbox" name="fav_season[]"value="autumn" id="">autumn

                            <br /> <label for="fav_meal">What's your favourite color : <span>{{(!empty($user_quiz)&&$user_quiz[3]!=='null')? "last time you said ":""  }}</label>
                            <input type="color" value="{{(!empty($user_quiz))?$user_quiz[3]:"#000"}}" name="fav_color" id="">

                            <button type="submit"   class="action">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
