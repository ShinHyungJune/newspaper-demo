<?php

namespace App\Http\Controllers;

use App\Enums\Category;
use App\Enums\PointType;
use App\Models\ReadHistory;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ReadHistoryController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            "category" => "nullable|string|max:500"
        ]);

        $request["category"] = $request->category ?? Category::POLITICS;

        $countTotal = auth()->user()->readHistories()->count();

        $countTotalText = auth()->user()->readHistories()->sum("count_text");

        $countTotalBook = auth()->user()->readHistories()->sum("count_text") / ReadHistory::getBookUnit();

        $countCategoryTotal = auth()->user()->readHistories()->where("category", $request->category)->count();

        $countCategoryTotalText = auth()->user()->readHistories()->where("category", $request->category)->sum("count_text");

        $countCategoryTotalBook = auth()->user()->readHistories()->where("category", $request->category)->sum("count_text") / ReadHistory::getBookUnit();

        $categories = Category::getValues();

        return Inertia::render("ReadHistories/Index", [
            "countTotal" => $countTotal,
            "countTotalText" => $countTotalText,
            "countTotalBook" => $countTotalBook,
            "countCategoryTotal" => $countCategoryTotal,
            "countCategoryTotalText" => $countCategoryTotalText,
            "countCategoryTotalBook" => $countCategoryTotalBook,
            "categories" => $categories,
            "category" => $request->category,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "url" => "required|string|max:500",
            "category" => "required|string|max:500",
            "count_text" => "required|integer|min:0"
        ]);

        $alreadyRead = auth()->user()->readHistories()->where("url", $request->url)->exists();

        if($alreadyRead)
            return redirect()->back();

        $readHistory = auth()->user()->readHistories()->create($request->all());

        return redirect()->back()->with("success", "기사 완독! 경험치 획득 +".$point);
    }
}
