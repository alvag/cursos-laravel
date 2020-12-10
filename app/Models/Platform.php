<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Platform extends Model
{
    use HasFactory;

    protected $guarded = [ 'id' ];

//    Relación uno a muchos
    public function lessons(): BelongsToMany
    {
        return $this->belongsToMany( Lesson::class );
    }
}
