<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Profile
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $biography
 * @property string|null $website
 * @property string|null $facebook
 * @property string|null $linkedin
 * @property string|null $youtube
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Profile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile query()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereBiography($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereLinkedin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereWebsite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereYoutube($value)
 * @mixin \Eloquent
 */
class Profile extends Model
{
    use HasFactory;

    protected $guarded = [ 'id' ];

//    Relación uno a uno inversa

    public function user(): BelongsTo
    {
        return $this->belongsTo( User::class );
    }
}
