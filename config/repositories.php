<?php

use App\Services\EloquentUserCommentsRepository;
use App\Services\SqlUserCommentsRepository;

return [
    'user_comments' => [
        'sql' => SqlUserCommentsRepository::class,
        'eloquent' => EloquentUserCommentsRepository::class,
    ]
];
