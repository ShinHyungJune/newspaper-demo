<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TemplateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "level_required" => $this->level_required,
            "color" => $this->color,
            "background_color" => $this->background_color,
            "img_badge" => $this->img_badge ?? "",
            "img_background" => $this->img_background ?? "",
        ];
    }
}
