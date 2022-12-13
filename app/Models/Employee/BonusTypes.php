<?php

namespace App\Models\Employee;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Employee\BonusTypes
 *
 * @mixin \Eloquent
 * @property integer $id
 * @property string $name
 * @property float $amount
 * @property string $note
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\BonusTypes whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\BonusTypes whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\BonusTypes whereAmount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\BonusTypes whereNote($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\BonusTypes whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\BonusTypes whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Employee\Bonus[] $bonus
 */
class BonusTypes extends Model
{
    public $guarded = ['id'];

    /**
     * Get all bonuses related to the bonusType
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bonus() {
        return $this->hasMany(Bonus::class, 'id');
    }
}
