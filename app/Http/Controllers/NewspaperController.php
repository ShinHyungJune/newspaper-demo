<?php

namespace App\Http\Controllers;

use App\Models\Curation;
use App\Models\Newspaper;
use Illuminate\Http\Request;

class NewspaperController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            "curation_id" => "required|integer",
            "url" => "required|string",
            "img_url" => "nullable|string|max:500",
            "title" => "nullable|string|max:500",
            "description" => "nullable|string|max:50000",
        ]);

        $curation = Curation::find($request->curation_id);

        if(!$curation)
            return redirect()->back()->with("error", "존재하지 않는 큐레이션입니다.");

        if($curation->user_id != auth()->id())
            return redirect()->back()->with("error", "자신의 큐레이션만 사용할 수 있습니다.");

        $alreadyStored = $curation->newspapers()->where("url", $request->url)->first();

        if(!$alreadyStored)
            $curation->newspapers()->create($request->all());

        return redirect()->back()->with("success", "성공적으로 처리되었습니다.");
    }

    public function destroy(Request $request)
    {
        $request->validate(["selected_ids"=>"required|array|min:1"]);

        /*if($newspaper->curation->user_id != auth()->id())
            return redirect()->back()->with("error", "자신의 큐레이션에서만 뉴스를 삭제할 수 있습니다.");

        $newspaper->delete();
    */

        Newspaper::whereIn("id", $request->selected_ids)->delete();

        return redirect()->back()->with("success", "성공적으로 처리되었습니다.");
    }

    public function next(Newspaper $newspaper)
    {
        $newspapers = $newspaper->curation->newspapers()->orderBy("order", "asc")->cursor();

        if($newspaper->order == $newspaper->curation->newspapers()->count())
            return redirect()->back();

        $targetOrder = $newspaper->order + 1;

        foreach($newspapers as $newspaperData){
            if($newspaperData->order = $targetOrder){
                $newspaperData->update(["order" => $newspaper->order]);
                $newspaper->update(["order" => $targetOrder]);

                break;
            }
        }

        return redirect()->back()->with("success", "성공적으로 처리되었습니다.");
    }

    public function prev(Newspaper $newspaper)
    {
        $newspapers = $newspaper->curation->newspapers()->orderBy("order", "asc")->cursor();

        if($newspaper->order == 1)
            return redirect()->back();

        $targetOrder = $newspaper->order - 1;

        foreach($newspapers as $newspaperData){
            if($newspaperData->order = $targetOrder){
                $newspaperData->update(["order" => $newspaper->order]);
                $newspaper->update(["order" => $targetOrder]);

                break;
            }
        }

        return redirect()->back()->with("success", "성공적으로 처리되었습니다.");
    }
}
