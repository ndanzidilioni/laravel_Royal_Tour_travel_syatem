<?php

namespace App\Models\Employee;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Employee\LoanType
 *
 * @mixin \Eloquent
 * @property integer $id
 * @property string $name
 * @property float $rate
 * @property integer $installment
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\LoanType whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\LoanType whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\LoanType whereRate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\LoanType whereInstallment($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\LoanType whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee\LoanType whereUpdatedAt($value)
 */
class LoanType extends Model
{
    public $guarded = ['id'];
}
