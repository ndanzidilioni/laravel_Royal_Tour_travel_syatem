<?php

namespace App\Models\Employee;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Employee\AdminTypes
 *
 * @mixin \Eloquent
 * @property integer $id
 * @property string $type
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\AdminTypes whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\AdminTypes whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\AdminTypes whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\AdminTypes whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\AdminTypes whereUpdatedAt($value)
 */
class AdminTypes extends Model
{
    //
}
