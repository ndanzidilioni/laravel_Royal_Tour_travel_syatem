<?php

namespace App\Models\Employee;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Employee\EmployeeTravelType
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Employee\EmployeeTravel[] $travels
 * @mixin \Eloquent
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\EmployeeTravelType whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\EmployeeTravelType whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\EmployeeTravelType whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\EmployeeTravelType whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\EmployeeTravelType whereUpdatedAt($value)
 */
class EmployeeTravelType extends Model
{
    public $guarded = ['id'];

    /**
     * get the all travels of a travel type
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function travels()
    {
        return $this->hasMany(EmployeeTravel::class, 'traveltype_id');
    }
}
