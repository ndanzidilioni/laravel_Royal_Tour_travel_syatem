<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Accounts\BillsType
 *
 * @property integer $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Accounts\Bills[] $bills
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\BillsType whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\BillsType whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\BillsType whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\BillsType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BillsType extends Model
{
    public $guarded = ['id'];

    public function bills()
    {
        return $this->hasMany(Bills::class, 'billtype_id');
    }

}
