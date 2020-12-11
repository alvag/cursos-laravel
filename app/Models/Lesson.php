<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * App\Models\Lesson
 *
 * @property int $id
 * @property string $name
 * @property string $url
 * @property string $iframe
 * @property int $section_id
 * @property int|null $platform_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read \App\Models\Description|null $description
 * @property-read \App\Models\Platform|null $platform
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Reaction[] $reactions
 * @property-read int|null $reactions_count
 * @property-read \App\Models\Resource|null $resource
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Section[] $section
 * @property-read int|null $section_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson query()
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereIframe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson wherePlatformId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereSectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereUrl($value)
 * @mixin \Eloquent
 */
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
