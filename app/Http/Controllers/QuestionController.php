<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionResource;
use App\Models\Question;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class QuestionController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            "correct" => "nullable|boolean",
            "word" => 'nullable|string|max:500'
        ]);

        $questions = Question::whereHas("answers", function($query){
            return $query->where("user_id", auth()->id());
        });

        if(isset($request->correct))
            $questions = $questions->whereHas("answers", function($query) use($request){
                return $request->correct ? $query->where("point", ">", 0) : $query->where("point", "=", 0);
            });

        if(isset($request->word))
            $questions = $questions->where("title", "LIKE", "%".$request->word."%");

        $questions = $questions->latest()->paginate(30);

        $countTotal = Question::whereHas("answers", function($query){
            return $query->where("user_id", auth()->id());
        })->count();

        $countCorrect = Question::whereHas("answers", function($query){
            return $query->where("user_id", auth()->id())->where("point", ">", 0);
        })->count();

        $countIncorrect = Question::whereHas("answers", function($query){
            return $query->where("user_id", auth()->id())->where("point", "=", 0);
        })->count();

        $countTotalPoint = auth()->user()->answers()->sum("point");

        return Inertia::render("Questions/Index", [
            "items" => QuestionResource::collection($questions),
            "countTotal" => $countTotal,
            "countCorrect" => $countCorrect,
            "countIncorrect" => $countIncorrect,
            "countTotalPoint" => $countTotalPoint,
            "correct" => isset($request->correct) ? $request->correct : ''
        ]);
    }
}
