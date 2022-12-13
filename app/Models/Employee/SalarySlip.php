<?php

namespace App\Models\Employee;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Employee\SalarySlip
 *
 * @mixin \Eloquent
 * @property integer $id
 * @property integer $user_id
 * @property string $month
 * @property float $pay
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\SalarySlip whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\SalarySlip whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\SalarySlip whereMonth($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\SalarySlip wherePay($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\SalarySlip whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\SalarySlip whereUpdatedAt($value)
 * @property-read \App\User $employee
 */
class SalarySlip extends Model
{
    public $guarded = ['id'];

    public function employee()
    {
        return $this->hasOne(User::class, 'id');
    }
}
