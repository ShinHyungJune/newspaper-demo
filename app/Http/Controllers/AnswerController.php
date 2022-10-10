<?php

namespace App\Http\Controllers;

use App\Enums\PointType;
use App\Http\Resources\QuestionResource;
use App\Models\PointHistory;
use App\Models\Question;
use App\Models\Quiz;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AnswerController extends Controller
{
    public function create(Request $request)
    {
        $questions = Question::where("opened_at", ">=", Carbon::now()->startOfDay())->where("opened_at", "<=", Carbon::now()->endOfDay())->paginate(60);

        $request["activeIndex"] = $request->activeIndex ?? 1;

        return Inertia::render("Answers/Create", [
            "questions" => QuestionResource::collection($questions),
            "activeIndex" => $request->activeIndex
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            "question_id" => "required|integer",
            "option_id" => "required|integer",
        ]);


        $question = Question::where("opened_at", ">=", Carbon::now()->startOfDay())
            ->where("opened_at", "<=", Carbon::now()->endOfDay())
            ->where("id", $request->question_id)
            ->first();

        if(!$question)
            return redirect()->back()->with("error", "오늘 공개된 퀴즈가 없습니다.");

        if($question->answers()->where("user_id", auth()->id())->first())
            return redirect()->back()->with("error", "이미 답변한 퀴즈에 재답변할 수 없습니다.");

        $option = $question->options()->find($request->option_id);

        if(!$option)
            return redirect()->back()->with("error", "존재하지 않는 옵션입니다.");

        auth()->user()->answers()->create([
            "option_id" => $option->id,
            "question_id" => $question->id,
        ]);

        return redirect()->back()->with("success", "성공적으로 처리되었습니다.");
    }
}
