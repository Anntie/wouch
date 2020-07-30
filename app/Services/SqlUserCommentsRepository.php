<?php

namespace App\Services;

use App\Contracts\UserCommentsRepositoryInterface;
use App\Http\Resources\Comment;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class SqlUserCommentsRepository implements UserCommentsRepositoryInterface
{
    public function getComments(int $userId): Collection
    {
        return collect(
            DB::select(
                DB::raw('
                    SELECT 
                        comments.id,
                        comments.content,
                        comments.created_at
                    FROM comments
                    WHERE comments.user_id = ?
                '), [$userId]
            )
        );
    }

    public function getResource(Collection $collection): JsonResource
    {
        return Comment::collection($collection);
    }
}