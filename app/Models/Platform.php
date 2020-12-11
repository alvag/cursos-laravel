<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Models\Platform
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Lesson[] $lessons
 * @property-read int|null $lessons_count
 * @method static \Illuminate\Database\Eloquent\Builder|Platform newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Platform newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Platform query()
 * @method static \Illuminate\Database\Eloquent\Builder|Platform whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Platform whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Platform whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Platform whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
