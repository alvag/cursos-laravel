<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Sanctum\PersonalAccessToken;
use Spatie\Permission\Traits\HasRoles;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string|null $remember_token
 * @property int|null $current_team_id
 * @property string|null $profile_photo_path
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read Collection|Course[] $coursesDictated
 * @property-read int|null $courses_dictated_count
 * @property-read Collection|Course[] $coursesEnrolled
 * @property-read int|null $courses_enrolled_count
 * @property-read string $profile_photo_url
 * @property-read Collection|Lesson[] $lessons
 * @property-read int|null $lessons_count
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read Profile|null $profile
 * @property-read Collection|Reaction[] $reactions
 * @property-read int|null $reactions_count
 * @property-read Collection|Review[] $reviews
 * @property-read int|null $reviews_count
 * @property-read Collection|PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User query()
 * @method static Builder|User whereCreatedAt( $value )
 * @method static Builder|User whereCurrentTeamId( $value )
 * @method static Builder|User whereEmail( $value )
 * @method static Builder|User whereEmailVerifiedAt( $value )
 * @method static Builder|User whereId( $value )
 * @method static Builder|User whereName( $value )
 * @method static Builder|User wherePassword( $value )
 * @method static Builder|User whereProfilePhotoPath( $value )
 * @method static Builder|User whereRememberToken( $value )
 * @method static Builder|User whereTwoFactorRecoveryCodes( $value )
 * @method static Builder|User whereTwoFactorSecret( $value )
 * @method static Builder|User whereUpdatedAt( $value )
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use HasRoles;
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

//    Relación uno a uno
    public function profile(): HasOne
    {
        return $this->hasOne( Profile::class );
    }

//    Relación uno a muchos
    public function coursesDictated(): HasMany
    {
        return $this->hasMany( Course::class );
    }

    public function reviews(): HasMany
    {
        return $this->hasMany( Review::class );
    }

    public function comments(): HasMany
    {
        return $this->hasMany( Comment::class );
    }

    public function reactions(): HasMany
    {
        return $this->hasMany( Reaction::class );
    }

//    Relación muchos a muchos
    public function coursesEnrolled(): BelongsToMany
    {
        return $this->belongsToMany( Course::class );
    }

    public function lessons(): BelongsToMany
    {
        return $this->belongsToMany( Lesson::class );
    }


}
