<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * App\Models\Reaction
 *
 * @property int $id
 * @property string $value
 * @property int $user_id
 * @property int $reactionable_id
 * @property string $reactionable_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Model|\Eloquent $reactionable
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Reaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|Reaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reaction whereReactionableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reaction whereReactionableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reaction whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reaction whereValue($value)
 * @mixin \Eloquent
 */
class Reaction extends Model
{
    use HasFactory;

    protected $guarded = [ 'id' ];

    const LIKE = 1;
    const DISLIKE = 2;

    public function reactionable(): MorphTo
    {
        return $this->morphTo();
    }

    //    Relación uno a muchos inversa
    public function user(): BelongsTo
    {
        return $this->belongsTo( User::class );
    }
}
