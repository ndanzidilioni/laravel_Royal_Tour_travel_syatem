<?php

namespace App\Models\Employee;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Employee\AdvancePayment
 *
 * @property integer $id
 * @property integer $user_id
 * @property float $amount
 * @property string $month
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\User $employee
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\AdvancePayment whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\AdvancePayment whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\AdvancePayment whereAmount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\AdvancePayment whereMonth($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\AdvancePayment whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\AdvancePayment whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property boolean $done
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\AdvancePayment whereDone($value)
 */
class AdvancePayment extends Model
{
    public $guarded = ['id'];
    /**
     * Get the employee associated with a adPayment
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function employee()
    {
        return $this->hasOne(User::class, 'user_id');
    }
}
