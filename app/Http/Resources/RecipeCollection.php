<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class RecipeCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return $this->collection->map(function($recipe){
            return [
                'id' => $recipe->id,
                'type' => 'recipe',
                'attributes' => [
                    'name' => $recipe->name,
                    'description' => $recipe->description,
                    'ingredients' => $recipe->ingredients,
                    'instructions' => $recipe->instructions,
                    'image' => $recipe->image,
                    'created_at' => $recipe->created_at,
                    'updated_at' => $recipe->updated_at,
                ],
            ];
        })->toArray();
    }
}
