<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class Comment extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'content' => $this->content,
            'post' => new Post($this->post ?? null),
            'created_at_ts' => $this->created_at instanceof Carbon
                ? $this->created_at->timestamp
                : Carbon::make($this->created_at)->timestamp,
        ];
    }
}
