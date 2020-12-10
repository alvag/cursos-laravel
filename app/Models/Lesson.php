<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Lesson extends Model
{
    use HasFactory;

    protected $guarded = [ 'id' ];

    //    Relación uno a muchos inversa
    public function section(): BelongsToMany
    {
        return $this->belongsToMany( Section::class );
    }

    public function platform(): BelongsTo
    {
        return $this->belongsTo( Platform::class );
    }

//    Relación de uno a uno

    public function description(): HasOne
    {
        return $this->hasOne( Description::class );
    }

//    Relación muchos a muchos
    public function users(): BelongsToMany
    {
        return $this->belongsToMany( User::class );
    }

//    Relación uno a uno polimorfica
    public function resource(): MorphOne
    {
        return $this->morphOne( Resource::class, 'resourceable' );
    }

    //    Relación uno a muchos polimorfica
    public function comments(): MorphMany
    {
        return $this->morphMany( Comment::class, 'commentable' );
    }

    public function reactions(): MorphMany
    {
        return $this->morphMany( Reaction::class, 'reactionable' );
    }
}
