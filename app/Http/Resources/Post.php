<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Post extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'content' => $this->content,
            'author' => $this->author,
            'created_at_ts' => $this->created_at->timestamp,
            'image_url' => optional($this->image)->url,
            'count_of_comments' => $this->comments_count ?? 0,
        ];
    }
}
