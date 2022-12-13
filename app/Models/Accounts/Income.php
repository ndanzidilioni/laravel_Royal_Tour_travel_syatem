<?php

namespace App\Models\Accounts;

use App\Models\Accounts\Income\ReservationIncome;
use App\Models\Accounts\Income\TourIncome;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Accounts\Income
 *
 * @property integer $id
 * @property string $month
 * @property float $income
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Accounts\Income\ReservationIncome[] $rentals
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Accounts\Income\TourIncome[] $tours
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\Income whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\Income whereMonth($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\Income whereIncome($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\Income whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\Income whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Income extends Model
{
    public $guarded = ['id'];

    /**
     * Return the rental incomes associated with a invoice
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rentals()
    {
        return $this->hasMany(ReservationIncome::class, 'income_id');
    }

    /**
     * Return the tours incomes associated with a invoice
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tours()
    {
        return $this->hasMany(TourIncome::class, 'income_id');
    }

}
