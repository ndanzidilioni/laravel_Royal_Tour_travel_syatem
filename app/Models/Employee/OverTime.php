<?php

namespace App\Models\Employee;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Employee\OverTime
 *
 * @property-read \App\Models\Employee\TimeSheet $timesheet
 * @mixin \Eloquent
 * @property integer $id
 * @property integer $timesheet_id
 * @property integer $overtimetype_id
 * @property float $hours
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\OverTime whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\OverTime whereTimesheetId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\OverTime whereOvertimetypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\OverTime whereHours($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\OverTime whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\OverTime whereUpdatedAt($value)
 * @property float $pay
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\OverTime wherePay($value)
 */
class OverTime extends Model
{
    public $guarded = ['id'];

    /**
     * Get the timesheet related to an over time
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function timesheet()
    {
        return $this->hasOne(TimeSheet::class, 'id');
    }
}
