<?php

namespace App\Models\Accounts\Income;

use App\Models\Accounts\Income;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Accounts\Income\TourIncome
 *
 * @property integer $id
 * @property integer $tour_id
 * @property integer $income_id
 * @property float $amount
 * @property string $date
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\Accounts\Income $income
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\Income\TourIncome whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\Income\TourIncome whereTourId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\Income\TourIncome whereIncomeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\Income\TourIncome whereAmount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\Income\TourIncome whereDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\Income\TourIncome whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\Income\TourIncome whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TourIncome extends Model
{
    public $guarded = ['id'];

    /**
     * Return the income that its belong into
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function income()
    {
        return $this->hasOne(Income::class, 'income_id');
    }
}
