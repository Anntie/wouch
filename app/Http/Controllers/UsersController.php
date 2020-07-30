<?php

namespace App\Http\Controllers;

use App\Http\Resources\WouchUserCollection;
use App\Models\WouchUser;
use Illuminate\Http\Request;
use App\Http\Resources\WouchUser as WouchUserResource;

class UsersController extends Controller
{
    public function active(Request $request)
    {
        $limit = $request->input('posts_limit', 0);

        $users = WouchUser::active()->with([
            'posts' => fn($query) => $query->whereNull('deleted_at')
        ])->when(
            $limit > 0 && is_int($limit),
            fn($query) => $query->limit($limit),
        )->get();

        return WouchUserResource::collection($users);
    }
}
