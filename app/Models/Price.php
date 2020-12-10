<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Price extends Model
{
    use HasFactory;

//    Relación uno a muchos
    public function course(): HasMany
    {
        return $this->hasMany( Course::class );
    }
}
