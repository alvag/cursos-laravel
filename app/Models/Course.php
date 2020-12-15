<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Carbon;

/**
 * App\Models\Course
 *
 * @property int $id
 * @property string $title
 * @property string $subtitle
 * @property string $description
 * @property string $status
 * @property string $slug
 * @property int $user_id
 * @property int|null $level_id
 * @property int|null $category_id
 * @property int|null $price_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Audience[] $audiences
 * @property-read int|null $audiences_count
 * @property-read float $rating
 * @property-read \App\Models\Category|null $category
 * @property-read Collection|\App\Models\Goal[] $goals
 * @property-read int|null $goals_count
 * @property-read Image|null $image
 * @property-read Collection|Lesson[] $lessons
 * @property-read int|null $lessons_count
 * @property-read Level|null $level
 * @property-read Price|null $price
 * @property-read Collection|Requirement[] $requirements
 * @property-read int|null $requirements_count
 * @property-read Collection|Review[] $reviews
 * @property-read int|null $reviews_count
 * @property-read Collection|Section[] $sections
 * @property-read int|null $sections_count
 * @property-read Collection|User[] $students
 * @property-read int|null $students_count
 * @property-read User $teacher
 * @method static Builder|Course newModelQuery()
 * @method static Builder|Course newQuery()
 * @method static Builder|Course query()
 * @method static Builder|Course whereCategoryId( $value )
 * @method static Builder|Course whereCreatedAt( $value )
 * @method static Builder|Course whereDescription( $value )
 * @method static Builder|Course whereId( $value )
 * @method static Builder|Course whereLevelId( $value )
 * @method static Builder|Course wherePriceId( $value )
 * @method static Builder|Course whereSlug( $value )
 * @method static Builder|Course whereStatus( $value )
 * @method static Builder|Course whereSubtitle( $value )
 * @method static Builder|Course whereTitle( $value )
 * @method static Builder|Course whereUpdatedAt( $value )
 * @method static Builder|Course whereUserId( $value )
 * @mixin Eloquent
 */
class Course extends Model
{
    use HasFactory;

    protected $guarded = [ 'id', 'status' ];
    protected $withCount = [ 'students', 'reviews' ];

    const DRAFT = 1;
    const REVIEW = 2;
    const PUBLISHED = 3;

    public function getRatingAttribute(): float
    {
        return $this->reviews_count ? round( $this->reviews->avg( 'rating' ), 1 ) : 5;
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    // Query scopes
    public function scopeCategory( $query, $category_id )
    {
        if ( $category_id ) {
            return $query->where( 'category_id', $category_id );
        }
    }

    public function scopeLevel( $query, $level_id )
    {
        if ( $level_id ) {
            return $query->where( 'level_id', $level_id );
        }
    }

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
