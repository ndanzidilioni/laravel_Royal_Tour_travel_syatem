<?php

namespace App\Models\Loyalty;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Loyalty\Loyalty
 *
 * @property integer $id
 * @property string $type
 * @property string $description
 * @property integer $discount
 * @property boolean $terminated
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Loyalty\Loyalty whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Loyalty\Loyalty whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Loyalty\Loyalty whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Loyalty\Loyalty whereDiscount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Loyalty\Loyalty whereTerminated($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Loyalty\Loyalty whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Loyalty\Loyalty whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Loyalty extends Model
{
    public $table = "loyalty";
    public $guarded=['id'];
}
