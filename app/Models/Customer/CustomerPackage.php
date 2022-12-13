<?php

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Customer\CustomerPackage
 *
 * @property integer $id
 * @property integer $customer_id
 * @property float $advance
 * @property float $total
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Customer\CustomerPackage whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Customer\CustomerPackage whereCustomerId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Customer\CustomerPackage whereAdvance($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Customer\CustomerPackage whereTotal($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Customer\CustomerPackage whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Customer\CustomerPackage whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property integer $tour_id
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Customer\CustomerPackage whereTourId($value)
 */
class CustomerPackage extends Model
{
    public $guarded = ['id'];

    public $table = 'customer_payment';
}
