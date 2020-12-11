<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Requirement
 *
 * @property int $id
 * @property string $name
 * @property int $course_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Course $course
 * @method static \Illuminate\Database\Eloquent\Builder|Requirement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Requirement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Requirement query()
 * @method static \Illuminate\Database\Eloquent\Builder|Requirement whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Requirement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Requirement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Requirement whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Requirement whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Requirement extends Model
{
    use HasFactory;

    protected $guarded = [ 'id' ];

//    Relación uno a muchos inversa
    public function course(): BelongsTo
    {
        return $this->belongsTo( Course::class );
    }
}
