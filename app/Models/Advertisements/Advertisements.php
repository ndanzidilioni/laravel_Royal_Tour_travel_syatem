<?php

namespace App\Models\Advertisements;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Advertisements\Advertisements
 *
 * @mixin \Eloquent
 * @property integer $id
 * @property string $name
 * @property integer $type_id
 * @property float $expense
 * @property string $sys
 * @property string $sys_url
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Advertisements\Advertisements whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Advertisements\Advertisements whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Advertisements\Advertisements whereTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Advertisements\Advertisements whereExpense($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Advertisements\Advertisements whereSys($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Advertisements\Advertisements whereSysUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Advertisements\Advertisements whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Advertisements\Advertisements whereUpdatedAt($value)
 * @property-read \App\Models\Advertisements\AdvertisementType $advertisement
 */
class Advertisements extends Model
{


    //

    protected $guarded = ['id'];

    public function advertisement()
    {
        return $this->hasOne(AdvertisementType::class, 'id', 'type_id');
    }




}
