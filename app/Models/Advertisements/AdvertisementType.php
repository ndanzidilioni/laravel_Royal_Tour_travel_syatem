<?php

namespace App\Models\Advertisements;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Advertisements\AdvertisementType
 *
 * @mixin \Eloquent
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Advertisements\AdvertisementType whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Advertisements\AdvertisementType whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Advertisements\AdvertisementType whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Advertisements\AdvertisementType whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Advertisements\AdvertisementType whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Advertisements\Advertisements[] $type
 */

class AdvertisementType extends Model
{
    //
    public $table = "advertisement_types";

    protected $guarded = ['id'];

    public function type()
    {
        return $this->hasMany(Advertisements::class, 'type_id');
    }


}
