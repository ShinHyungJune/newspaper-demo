<?php

namespace App\Http\Controllers;

use App\Http\Resources\CurationResource;
use App\Http\Resources\NewspaperResource;
use App\Http\Resources\TemplateResource;
use App\Models\Curation;
use App\Models\Template;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CurationController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            "word" => "nullable|string|max:500"
        ]);

        $curations = auth()->user()->curations()->latest();

        $countTotal = auth()->user()->curations()->count();

        if($request->word)
            $curations = $curations->where("title", "LIKE", "%".$request->word."%");

        $curations = $curations->paginate(60);

        return Inertia::render("Curations/Index", [
            "items" => CurationResource::collection($curations),
            "countTotal" => $countTotal
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "title" => "required|string|max:500"
        ]);

        $curation = auth()->user()->curations()->create($request->all());

        return redirect()->back()->with("success", "성공적으로 처리되었습니다.");
    }

    public function destroy(Request $request)
    {
        $request->validate([
            "selected_ids" => "required|array|min:1"
        ]);

        auth()->user()->curations()->whereIn("id", $request->selected_ids)->delete();

        return redirect()->back()->with("success", "성공적으로 처리되었습니다.");
    }

    public function show(Curation $curation, Request $request)
    {
        $request->validate([
            "word" => "nullable|string|max:500"
        ]);

        $newspapers = $curation->newspapers()->orderBy("order", "asc");

        if($request->word)
            $newspapers->where("title", "LIKE", "%".$request->word."%");

        $newspapers = $newspapers->paginate(60);

        $templates = Template::orderBy("level_required", "asc")->paginate(60);

        if(!auth()->user() || auth()->user()->id != $curation->user_id)
            $curation->update(["count_view" => $curation->count_view + 1]);

        return Inertia::render("Curations/Show", [
            "curation" => CurationResource::make($curation),
            "newspapers" => NewspaperResource::collection($newspapers),
            "templates" => TemplateResource::collection($templates)
        ]);
    }
}
