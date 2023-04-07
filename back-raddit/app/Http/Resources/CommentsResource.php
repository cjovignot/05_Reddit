<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => (string)$this->id,
            'attributes' => [
                'content' => $this->content,
                'author_id' => $this->author_id,
                'post_id' => $this->post_id,
                'crops' => $this->crops,
                'Created_at' => $this->Created_at,
                'updated_at' => $this->updated_at,

            ]

        ];
    }
}
