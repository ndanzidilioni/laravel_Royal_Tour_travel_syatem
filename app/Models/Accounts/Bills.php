<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Accounts\Bills
 *
 * @property integer $id
 * @property integer $billtype_id
 * @property string $bill_no
 * @property string $amount
 * @property string $date
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\Accounts\BillsType $billType
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\Bills whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\Bills whereBilltypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\Bills whereBillNo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\Bills whereAmount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\Bills whereDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\Bills whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\Bills whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read mixed $type
 */
class Bills extends Model
{
    public $guarded = ['id'];

    public function billType()
    {
        return $this->hasOne(BillsType::class, 'id', 'billtype_id');
    }

    /**
     * @return array
     */
    public function getTypeAttribute()
    {
        return $this->billType->id;
    }

}
