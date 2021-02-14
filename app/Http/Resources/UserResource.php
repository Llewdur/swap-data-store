<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'created_at' => $this->created_at,
            'email' => $this->email,
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}
