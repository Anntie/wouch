<?php

namespace App\Services;

use App\Contracts\UserCommentsRepositoryInterface;
use App\Models\Comment;
use App\Models\WouchUser;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;
use App\Http\Resources\Comment as CommentResource;

class EloquentUserCommentsRepository implements UserCommentsRepositoryInterface
{
    public function getComments(int $userId): Collection
    {
        $comments = WouchUser::find($userId)
            ->comments()
            ->with([
                'post' => fn($query) => $query->whereHas('image')
                    ->with(['author' => fn($query) => $query->where('active', true)])
                    ->withCount('comments')
            ])
            ->get();

        $comments->each(
            fn(Comment $comment) => $comment->post->load('image')
        );

        return $comments;
    }

    public function getResource(Collection $collection): JsonResource
    {
        return CommentResource::collection($collection);
    }
}