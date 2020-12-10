<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Section extends Model
{
    use HasFactory;

    protected $guarded = [ 'id' ];

    //    Relación uno a muchos inversa
    public function course(): BelongsTo
    {
        return $this->belongsTo( Course::class );
    }

//    Relación uno a muchos
    public function lessons(): HasMany
    {
        return $this->hasMany( Lesson::class );
    }
}
