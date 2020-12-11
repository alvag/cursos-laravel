<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Description
 *
 * @property int $id
 * @property string $name
 * @property int $lesson_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Lesson $lesson
 * @method static \Illuminate\Database\Eloquent\Builder|Description newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Description newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Description query()
 * @method static \Illuminate\Database\Eloquent\Builder|Description whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Description whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Description whereLessonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Description whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Description whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Description extends Model
{
    use HasFactory;

    protected $guarded = [ 'id' ];

    //    Relación de uno a uno inversa
    public function lesson(): BelongsTo
    {
        return $this->belongsTo( Lesson::class );
    }

}
