<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MenuResource extends JsonResource
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
            'id' => $this->id,
            'name'=>$this->name,
            'price'=>$this->price,
            'description'=>$this->description,
            'photo_path'=>$this->photo_path,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
