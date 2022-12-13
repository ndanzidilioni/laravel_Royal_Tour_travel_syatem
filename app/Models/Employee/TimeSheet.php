<?php

namespace App\Models\Employee;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Employee\TimeSheet
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Employee\OverTime[] $overtime
 * @mixin \Eloquent
 * @property integer $id
 * @property integer $user_id
 * @property string $day
 * @property string $check_in
 * @property string $check_out
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\TimeSheet whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\TimeSheet whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\TimeSheet whereDay($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\TimeSheet whereCheckIn($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\TimeSheet whereCheckOut($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\TimeSheet whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\TimeSheet whereUpdatedAt($value)
 * @property-read \App\User $employee
 */
class TimeSheet extends Model
{
    public $guarded = ['id'];

    public $dates  = ['check_in', 'check_out', 'day'];

    /**
     * Get the overtimes related a timesheet
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function overtime()
    {
        return $this->hasMany(OverTime::class, 'timesheet_id');
    }

    /**
     * Get the employee related to timesheet
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function employee()
    {
        return $this->hasOne(User::class, 'id');
    }
}
