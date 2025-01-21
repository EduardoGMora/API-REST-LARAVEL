<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TagCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return $this->collection->map(function($tag){
            return [
                'id' => $tag->id,
                'type' => 'tag',
                'attributes' => [
                    'name' => $tag->name,
                    'created_at' => $tag->created_at,
                    'updated_at' => $tag->updated_at
                ],
            ];
        })->toArray();
    }
}
