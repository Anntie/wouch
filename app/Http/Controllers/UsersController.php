<?php

namespace App\Http\Controllers;

use App\Contracts\UserCommentsRepositoryInterface;
use App\Http\Resources\Comment as CommentResource;
use App\Http\Resources\WouchUser as WouchUserResource;
use App\Models\WouchUser;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UsersController extends Controller
{
    public function active(Request $request): JsonResource
    {
        // Task 6.1
        $limit = $request->input('posts_limit', 0);

        $users = WouchUser::active()->with([
            'posts' => fn($query) => $query->whereNull('deleted_at')
                ->withCount('comments') // Task 6.2
                ->orderBy('comments_count', 'desc'), // Task 6.3
            'author' => fn($query) => $query->where('active', true),
        ])->when(
            $limit > 0 && is_int($limit),
            fn($query) => $query->limit($limit),
        )->get();

        return WouchUserResource::collection($users);
    }

    public function comments(Request $request, int $userId): JsonResource
    {
        $userCommentsRepository = app()->make(UserCommentsRepositoryInterface::class, [
            'type' => $request->input('type', 'eloquent')
        ]);

        return CommentResource::collection(
            $userCommentsRepository->getComments($userId)
        );
    }
}
