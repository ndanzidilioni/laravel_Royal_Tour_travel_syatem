<?php

namespace App\Models\Tour;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Tour\Hotel
 *
 * @property integer $id
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $city
 * @property integer $expenses
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tour\Hotel whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tour\Hotel whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tour\Hotel wherePhone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tour\Hotel whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tour\Hotel whereCity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tour\Hotel whereExpenses($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tour\Hotel whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tour\Hotel whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Hotel extends Model
{
    public $guarded = ['id'];
}
