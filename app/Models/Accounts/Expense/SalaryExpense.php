<?php

namespace App\Models\Accounts\Expense;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Accounts\Expense\SalaryExpense
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $expense_id
 * @property float $amount
 * @property string $day
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\Accounts\Expense\SalaryExpense $expense
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\Expense\SalaryExpense whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\Expense\SalaryExpense whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\Expense\SalaryExpense whereExpenseId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\Expense\SalaryExpense whereAmount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\Expense\SalaryExpense whereDay($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\Expense\SalaryExpense whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\Expense\SalaryExpense whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SalaryExpense extends Model
{
    public $guarded = ['id'];

    public function expense()
    {
        return $this->hasOne(SalaryExpense::class, 'expense_id');
    }
}
