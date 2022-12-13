<?php

namespace App\Models\Employee;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Employee\Leave
 *
 * @mixin \Eloquent
 * @property integer $id
 * @property integer $leavetype_id
 * @property integer $user_id
 * @property string $reason
 * @property string $time
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\Leave whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\Leave whereLeavetypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\Leave whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\Leave whereReason($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\Leave whereTime($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\Leave whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\Leave whereUpdatedAt($value)
 */
class Leave extends Model
{
    public $guarded = ['id'];
}
