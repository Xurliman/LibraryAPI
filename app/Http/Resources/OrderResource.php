<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'group' => $this->group->name,
            'faculty' => $this->group->faculty->name,
            'books' => BookResource::collection($this->books)
        ];
    }
}
