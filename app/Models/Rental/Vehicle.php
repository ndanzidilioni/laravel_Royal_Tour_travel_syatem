<?php

namespace App\Models\Rental;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Rental\Vehicle
 *
 * @property integer $id
 * @property string $vehicle_name
 * @property string $reg_no
 * @property string $m_year
 * @property string $color
 * @property string $type
 * @property string $b_type
 * @property float $cost_per_day
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Rental\Vehicle whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Rental\Vehicle whereVehicleName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Rental\Vehicle whereRegNo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Rental\Vehicle whereMYear($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Rental\Vehicle whereColor($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Rental\Vehicle whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Rental\Vehicle whereBType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Rental\Vehicle whereCostPerDay($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Rental\Vehicle whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Rental\Vehicle whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property boolean $terminated
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Rental\Vehicle whereTerminated($value)
 */
class Vehicle extends Model
{
    public $table = "vehicle";

    public $guarded = ['id'];
}
