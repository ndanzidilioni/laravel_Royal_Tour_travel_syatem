<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Accounts\QuickBook
 *
 * @property integer $id
 * @property float $amount
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\QuickBook whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\QuickBook whereAmount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\QuickBook whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\QuickBook whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\QuickBook whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property boolean $type
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\QuickBook whereType($value)
 */
class QuickBook extends Model
{
    public $guarded = ['id'];
}
