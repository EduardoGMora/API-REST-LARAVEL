<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RecipeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return ['id' => $this->id,
                'type' => 'recipe',
                'attributes' => [
                    'name' => $this->name,
                    'description' => $this->description,
                    'ingredients' => $this->ingredients,
                    'instructions' => $this->instructions,
                    'image' => $this->image,
                    'created_at' => $this->created_at,
                    'updated_at' => $this->updated_at,
                ],
                'relationships' => [
                    'user' => $this->user,
                    'category' => $this->category,
                    'tags' => $this->tags,
                ],
        ];
    }
}
