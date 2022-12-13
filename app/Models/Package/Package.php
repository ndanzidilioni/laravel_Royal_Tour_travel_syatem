<?php

namespace App\Models\Package;

use App\Models\Tour\Tour;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Package\Package
 *
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property string $country
 * @property string $destination
 * @property integer $days
 * @property float $price
 * @property string $description
 * @property boolean $terminated
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Package\Package whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Package\Package whereCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Package\Package whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Package\Package whereCountry($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Package\Package whereDestination($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Package\Package whereDays($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Package\Package wherePrice($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Package\Package whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Package\Package whereTerminated($value)
 * @mixin \Eloquent
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Package\Package whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Package\Package whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tour\Tour[] $tours
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Package\PackageDay[] $details
 */
class Package extends Model
{
    public $guarded = ['id'];

    public $table = 'package';

    public function tours()
    {
        return $this->hasMany(Tour::class, 'package_id');
    }

    public function details()
    {
        return $this->hasMany(PackageDay::class, 'package_id');
    }
}
