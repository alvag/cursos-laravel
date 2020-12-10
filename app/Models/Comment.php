<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [ 'id' ];

    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }

//    Relación uno a muchos polimórfica
    public function comments()
    {
        return $this->morphMany( Comment::class, 'commentable' );
    }

    public function reactions(): MorphMany
    {
        return $this->morphMany( Reaction::class, 'reactionable' );
    }

//    Relación uno a muchos inversa
    public function user(): BelongsTo
    {
        return $this->belongsTo( User::class );
    }
}
