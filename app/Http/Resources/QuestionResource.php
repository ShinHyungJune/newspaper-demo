<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $answer = null;

        if(auth()->user())
            $answer = $this->answers()->where("user_id", auth()->id())->first();

        return [
            "id" => $this->id,
            "title" => $this->title,
            "description" => $this->description,
            "explain" => $this->explain,
            "answer" => $answer ? AnswerResource::make($answer) : "",
            "options" => OptionResource::collection($this->options),
            "url" => $this->url,
            "point" => $this->point,
            "ratio_correct" => $this->answers()->count() === 0 ? 0 : floor($this->answers()->where("point", ">", 0)->count() / $this->answers()->count() * 100)
        ];
    }
}
