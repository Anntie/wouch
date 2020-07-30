<?php

namespace App\Services;

use App\Contracts\UserCommentsRepositoryInterface;
use App\Http\Resources\Comment;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class BuilderUserCommentsRepository implements UserCommentsRepositoryInterface
{
    public function getComments(int $userId): Collection
    {
        return DB::table('comments')->select(
                'comments.id',
                'comments.content',
                'comments.created_at',
            )
            ->where('comments.user_id', $userId)
            ->get();
    }

    public function getResource(Collection $collection): JsonResource
    {
        return Comment::collection($collection);
    }
}