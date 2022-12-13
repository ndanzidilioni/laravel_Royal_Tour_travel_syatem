<?php

namespace App\Models\Accounts;

use App\Models\Accounts\Expense\AdvertisingExpense;
use App\Models\Accounts\Expense\SalaryExpense;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Accounts\Expense
 *
 * @property integer $id
 * @property string $day
 * @property float $expense
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Accounts\Expense\SalaryExpense[] $salary
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Accounts\Expense\AdvertisingExpense[] $advertising
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\Expense whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\Expense whereDay($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\Expense whereExpense($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\Expense whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\Expense whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Expense extends Model
{
    public $guarded = ['id'];


    public function salary()
    {
        return $this->hasMany(SalaryExpense::class, 'expense_id');
    }

    public function advertising()
    {
        return $this->hasMany(AdvertisingExpense::class, 'expense_id');
    }
}
