<?php

namespace App\Models\Employee;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Employee\Bonus
 *
 * @property-read \App\Models\Employee\BonusTypes $bonusType
 * @mixin \Eloquent
 * @property integer $id
 * @property integer $bonustype_id
 * @property string $month
 * @property float $amount
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\Bonus whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\Bonus whereBonustypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\Bonus whereMonth($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\Bonus whereAmount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\Bonus whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\Bonus whereUpdatedAt($value)
 */
class Bonus extends Model
{
    public $guarded = ['id'];

    /**
     * Get the bonus type associated with the bonus
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function bonusType() {
        return $this->hasOne(BonusTypes::class, 'id');
    }
}
