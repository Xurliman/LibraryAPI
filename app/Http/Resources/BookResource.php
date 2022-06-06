<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'genre' => $this->genre,
            'author' => $this->author,
            'title' => $this->title,
            // 'count' => $this->order->count,
            'amount' => $this->amount,
        ];
    }
}   
