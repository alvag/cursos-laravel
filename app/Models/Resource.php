<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * App\Models\Resource
 *
 * @property int $id
 * @property string $url
 * @property int $resourceable_id
 * @property string $resourceable_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Model|\Eloquent $resourceable
 * @method static \Illuminate\Database\Eloquent\Builder|Resource newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Resource newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Resource query()
 * @method static \Illuminate\Database\Eloquent\Builder|Resource whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resource whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resource whereResourceableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resource whereResourceableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resource whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resource whereUrl($value)
 * @mixin \Eloquent
 */
class Resource extends Model
{
    use HasFactory;

    protected $guarded = [ 'id' ];

    public function resourceable(): MorphTo
    {
        return $this->morphTo();
    }
}
