<?php

namespace App\Http\Controllers;

use App\Models\quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function show($id)
    {
        $info="";
        $quiz = quiz::where('user_id', $id)->get();  
        if($quiz->last()!==null)
        $info = $quiz->last()->respond;
        
        error_log(json_encode($info));
        return view('quiz', ['user_quiz' => $info]);
    }
    public function store($id){ 
        redirect('quiz');
$quiz=new quiz();
$responses=[json_encode(request('fav_meal')),json_encode(request('fav_music_genre')),
json_encode(request('fav_season')),request('fav_color')];

$quiz->respond=$responses;
$quiz->user_id=$id;
$quiz->save();
return view('quiz',['user_quiz' =>$quiz->respond]);

    }
}
