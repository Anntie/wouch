<?php

namespace App\Contracts;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

interface UserCommentsRepositoryInterface
{
    public function getComments(int $userId): Collection;
    public function getResource(Collection $collection): JsonResource;
}
