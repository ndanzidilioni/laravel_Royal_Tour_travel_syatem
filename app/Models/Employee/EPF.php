<?php

namespace App\Models\Employee;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Employee\EPF
 *
 * @property-read \App\User $employee
 * @mixin \Eloquent
 * @property integer $id
 * @property integer $user_id
 * @property float $amount
 * @property string $month
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\EPF whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\EPF whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\EPF whereAmount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\EPF whereMonth($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\EPF whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\EPF whereUpdatedAt($value)
 */
class EPF extends Model
{

    public $table = 'e_p_fs';

    public $guarded = ['id'];

    /**
     * Get the user associated with EPF
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function employee()
    {
        return $this->hasOne(User::class, 'user_id');
    }

}
