<?php

namespace App\Models\Employee;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Employee\EmployeeTravel
 *
 * @property-read \App\Models\Employee\EmployeeTravelType $type
 * @mixin \Eloquent
 * @property integer $id
 * @property integer $user_id
 * @property integer $traveltype_id
 * @property float $amount
 * @property string $date
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\EmployeeTravel whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\EmployeeTravel whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\EmployeeTravel whereTraveltypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\EmployeeTravel whereAmount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\EmployeeTravel whereDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\EmployeeTravel whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\EmployeeTravel whereUpdatedAt($value)
 * @property-read \App\User $employee
 */
class EmployeeTravel extends Model
{
    public $guarded = ['id'];

    public $dates = ['date'];

    /**
     *  Get the type details of a employee travel
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function type()
    {
        return $this->hasOne(EmployeeTravelType::class, 'traveltype_id');
    }

    public function employee()
    {
        return $this->hasOne(User::class, 'id');
    }
}
