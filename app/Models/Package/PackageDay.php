<?php

namespace App\Models\Package;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Package\PackageDay
 *
 * @property integer $id
 * @property integer $package_id
 * @property string $day
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Package\PackageDay whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Package\PackageDay wherePackageId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Package\PackageDay whereDay($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Package\PackageDay whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Package\PackageDay whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Package\PackageDay whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PackageDay extends Model
{
    public $guarded = ['id'];
}
