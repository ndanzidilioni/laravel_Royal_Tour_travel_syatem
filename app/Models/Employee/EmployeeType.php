<?php

namespace App\Models\Employee;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * App\Models\Employee\EmployeeType
 *
 * @property integer $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $employees
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\EmployeeType whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\EmployeeType whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\EmployeeType whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\EmployeeType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class EmployeeType extends Model
{
    public $fillable = ['id'];

    /**
     * Get the Employees associated with employee type
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function employees()
    {
        return $this->belongsToMany(User::class, 'employee_type_user', 'employee_type_id', 'user_id');
    }
}
