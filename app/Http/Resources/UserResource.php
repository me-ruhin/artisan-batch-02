<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'fullName' => $this->name,
            'userId' => $this->id,
            'email' => $this->email,
            'posts' => PostResource::collection($this->posts)
        ];
    }
}
