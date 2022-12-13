<?php

namespace App\Models\Employee;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Employee\LeaveAllowance
 *
 * @property-read \App\User $employee
 * @mixin \Eloquent
 * @property integer $id
 * @property integer $user_id
 * @property string $day
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\LeaveAllowance whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\LeaveAllowance whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\LeaveAllowance whereDay($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\LeaveAllowance whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\LeaveAllowance whereUpdatedAt($value)
 */
class LeaveAllowance extends Model
{
    /**
     * Get the leave allowance of a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function employee()
    {
        return $this->hasOne(User::class, 'user_id');
    }
}
