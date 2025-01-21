<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

// add resources
use App\Http\Resources\RecipeResource;

class TagResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'type' => 'tag',
            'attributes' => [
                'name' => $this->name,
            ],
            'relationships' => [
                'recipes' => RecipeResource::collection( $this->recipes),
            ]
        ];
    }
}
