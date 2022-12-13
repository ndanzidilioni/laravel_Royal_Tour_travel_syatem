<?php

namespace App\Models\Accounts\Expense;

use App\Models\Accounts\Expense;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Accounts\Expense\AdvertisingExpense
 *
 * @property integer $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\Accounts\Expense $expense
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\Expense\AdvertisingExpense whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\Expense\AdvertisingExpense whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\Expense\AdvertisingExpense whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AdvertisingExpense extends Model
{
    public $guarded = ['id'];

    public function expense()
    {
        return $this->hasOne(Expense::class, 'expense_id');
    }
}
