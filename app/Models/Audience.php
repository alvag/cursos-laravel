<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Audience
 *
 * @property int $id
 * @property string $name
 * @property int $course_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Course $course
 * @method static \Illuminate\Database\Eloquent\Builder|Audience newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Audience newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Audience query()
 * @method static \Illuminate\Database\Eloquent\Builder|Audience whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Audience whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Audience whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Audience whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Audience whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Audience extends Model
{
    use HasFactory;

    protected $guarded = [ 'id' ];

    //    Relación uno a muchos inversa
    public function course(): BelongsTo
    {
        return $this->belongsTo( Course::class );
    }
}
