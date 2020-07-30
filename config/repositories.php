<?php

use App\Services\EloquentUserCommentsRepository;
use App\Services\SqlUserCommentsRepository;
use App\Services\BuilderUserCommentsRepository;

return [
    'user_comments' => [
        'sql' => SqlUserCommentsRepository::class,
        'eloquent' => EloquentUserCommentsRepository::class,
        'builder' => BuilderUserCommentsRepository::class,
    ]
];
