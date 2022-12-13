<?php

namespace App;

use App\Models\Employee\AdminTypes;
use App\Models\Employee\AdvancePayment;
use App\Models\Employee\Bonus;
use App\Models\Employee\EmployeeTravel;
use App\Models\Employee\EmployeeType;
use App\Models\Employee\EPF;
use App\Models\Employee\Leave;
use App\Models\Employee\LeaveAllowance;
use App\Models\Employee\Loan;
use App\Models\Employee\NoPay;
use App\Models\Employee\OverTime;
use App\Models\Employee\PayeTax;
use App\Models\Employee\SalarySlip;
use App\Models\Employee\TimeSheet;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\User
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Employee\AdminTypes[] $admin
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Employee\TimeSheet[] $timesheet
 * @property-read mixed $type_lists
 * @mixin \Eloquent
 * @property integer $id
 * @property string $name
 * @property string $lastname
 * @property string $email
 * @property string $password
 * @property string $nic
 * @property float $basic
 * @property boolean $gender
 * @property boolean $terminated
 * @property string $hired_date
 * @property string $terminated_date
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereLastname($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereNic($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereBasic($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereGender($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereTerminated($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereHiredDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereTerminatedDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Employee\EmployeeType[] $employee_type
 * @property-read mixed $employee_types
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Employee\NoPay[] $nopay
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Employee\Leave[] $loans
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Employee\SalarySlip[] $salaryslip
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Employee\Leave[] $leaves
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Employee\EmployeeTravel[] $travels
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Employee\OverTime[] $overtimes
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Employee\PayeTax[] $payetax
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Employee\LeaveAllowance[] $leaveAllowance
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Employee\EPF[] $epf
 * @property float $hour_rate
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Employee\AdvancePayment[] $advance
 * @method static \Illuminate\Database\Query\Builder|\App\User whereHourRate($value)
 * @property integer $age
 * @property string $address
 * @method static \Illuminate\Database\Query\Builder|\App\User whereAge($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereAddress($value)
 */
class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'nic'
    ];

    /**
     * Get the user's admin types
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function admin()
    {
        return $this->belongsToMany(AdminTypes::class, 'admin_type_user', 'user_id', 'admin_type_id');
    }

    /**
     * Get user's time sheets ( per day )
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function timesheet()
    {
        return $this->hasMany(TimeSheet::class, 'user_id');
    }

    /**
     * Get no pays's related to a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function nopay()
    {
        return $this->hasMany(NoPay::class, 'user_id');
    }

    /**
     * Get all loans associated with a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function loans()
    {
        return $this->hasMany(Loan::class, 'user_id');
    }

    /**
     * Get the salary slip for the employee
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function salaryslip()
    {
        return $this->hasMany(SalarySlip::class, 'user_id');
    }

    /**
     * Get eligible employee type
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function employee_type()
    {
        return $this->belongsToMany(EmployeeType::class, 'employee_type_user', 'user_id');
    }

    /**
     * Get the leaves of the of an employee
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function leaves()
    {
        return $this->hasMany(Leave::class, 'user_id');
    }

    /**
     * Get the travel details of the userS
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function travels()
    {
        return $this->hasMany(EmployeeTravel::class, 'user_id');
    }

    /**
     * Get the over time related to an employee
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function overtimes()
    {
        return $this->hasManyThrough(OverTime::class, TimeSheet::class, 'user_id', 'timesheet_id');
    }

    /**
     *  Get the paye tax related to the employee
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function payetax()
    {
        return $this->hasMany(PayeTax::class, 'user_id');
    }

    /**
     * Get the leave allowance of a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function leaveAllowance()
    {
        return $this->hasMany(LeaveAllowance::class, 'user_id');
    }

    /**
     * Get the EPF associated with a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function epf()
    {
        return $this->hasMany(EPF::class, 'user_id');
    }

    /**
     * Get the adavance payment of a employee
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function advance()
    {
        return $this->hasMany(AdvancePayment::class, 'user_id');
    }

    /**
     * Get the list of admin types
     *
     * @return mixed
     */
    public function getTypeListsAttribute()
    {
        return $this->admin->pluck('id')->all();
    }

    /**
     * Get list of employee types
     *
     * @return array
     */
    public function getEmployeeTypesAttribute()
    {
        return $this->employee_type->pluck('id')->all();
    }

}
