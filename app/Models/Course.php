<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Course extends Model
{
    use HasFactory;

    protected $guarded = [ 'id', 'status' ];

    const DRAFT = 1;
    const REVIEW = 2;
    const PUBLISHED = 3;

//    Relación uno a muchos inversa
    public function teacher(): BelongsTo
    {
        return $this->belongsTo( User::class, 'user_id' );
    }

    public function level(): BelongsTo
    {
        return $this->belongsTo( Level::class );
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo( Category::class );
    }

    public function price(): BelongsTo
    {
        return $this->belongsTo( Price::class );
    }

//    Relación de muchos a muchos
    public function students(): BelongsToMany
    {
        return $this->belongsToMany( User::class );
    }

//    Relación uno a muchos
    public function reviews(): HasMany
    {
        return $this->hasMany( Review::class );
    }

    public function requirements(): HasMany
    {
        return $this->hasMany( Requirement::class );
    }

    public function goals(): HasMany
    {
        return $this->hasMany( Goal::class );
    }

    public function audiences(): HasMany
    {
        return $this->hasMany( Audience::class );
    }

    public function sections(): HasMany
    {
        return $this->hasMany( Section::class );
    }

//    Relación uno a uno polimorfica
    public function image(): MorphOne
    {
        return $this->morphOne( Image::class, 'imageable' );
    }


    public function lessons(): HasManyThrough
    {
        return $this->hasManyThrough( Lesson::class, Section::class );
    }
}
