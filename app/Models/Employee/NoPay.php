<?php

namespace App\Models\Employee;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Employee\NoPay
 *
 * @property-read \App\User $employee
 * @mixin \Eloquent
 * @property integer $id
 * @property integer $user_id
 * @property string $day
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\NoPay whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\NoPay whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\NoPay whereDay($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\NoPay whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\NoPay whereUpdatedAt($value)
 */
class NoPay extends Model
{
    public $guarded = ['id'];

    /**
     * Get the employee related to a no pay record
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function employee()
    {
            return $this->hasOne(User::class, 'id');
    }
}
