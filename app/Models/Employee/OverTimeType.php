<?php

namespace App\Models\Employee;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Employee\OverTimeType
 *
 * @mixin \Eloquent
 * @property integer $id
 * @property string $name
 * @property float $rate
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\OverTimeType whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\OverTimeType whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\OverTimeType whereRate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\OverTimeType whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\OverTimeType whereUpdatedAt($value)
 */
class OverTimeType extends Model
{
    public $guarded = ['id'];
}
