<?php

namespace App\Models\Accounts\Income;

use App\Models\Accounts\Income;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Accounts\Income\ReservationIncome
 *
 * @property integer $id
 * @property integer $reservation_id
 * @property integer $income_id
 * @property float $amount
 * @property string $date
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\Accounts\Income $income
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\Income\ReservationIncome whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\Income\ReservationIncome whereReservationId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\Income\ReservationIncome whereIncomeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\Income\ReservationIncome whereAmount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\Income\ReservationIncome whereDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\Income\ReservationIncome whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\Income\ReservationIncome whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ReservationIncome extends Model
{

    public $guarded = ['id'];

    /**
     * Return the income that it's belong into
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function income()
    {
        return $this->hasOne(Income::class, 'income_id');
    }


}
