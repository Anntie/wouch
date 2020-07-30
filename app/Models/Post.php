<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = ['content'];

    public function image(): BelongsTo
    {
        return $this->belongsTo(Image::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(WouchUser::class, 'author_id');
    }
}
