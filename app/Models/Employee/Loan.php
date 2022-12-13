<?php

namespace App\Models\Employee;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Employee\Loan
 *
 * @mixin \Eloquent
 * @property integer $id
 * @property integer $loan_type_id
 * @property integer $user_id
 * @property float $amount
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\Loan whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\Loan whereLoanTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\Loan whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\Loan whereAmount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\Loan whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\Loan whereUpdatedAt($value)
 * @property boolean $isOver
 * @property float $decrement
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\Loan whereIsOver($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\Loan whereDecrement($value)
 * @property float $remaining
 * @property integer $paytime
 * @property-read \App\Models\Employee\LoanType $type
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\Loan whereRemaining($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\Loan wherePaytime($value)
 */
class Loan extends Model
{

    public $guarded = ['id'];

    /**
     * Get the loan type of the loan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function type()
    {
        return $this->hasOne(LoanType::class, 'id', 'loan_type_id');
    }
}
