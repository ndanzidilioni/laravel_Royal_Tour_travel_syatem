<?php

namespace App\Models\Employee;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Employee\PayeTax
 *
 * @property-read \App\User $employee
 * @mixin \Eloquent
 * @property integer $id
 * @property integer $user_id
 * @property float $amount
 * @property string $month
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\PayeTax whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\PayeTax whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\PayeTax whereAmount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\PayeTax whereMonth($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\PayeTax whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\PayeTax whereUpdatedAt($value)
 */
class PayeTax extends Model
{
    public $guarded = ['id'];

    /**
     * Get user associated with a paye tax
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function employee()
    {
        return $this->hasOne(User::class, 'id');
    }
}
