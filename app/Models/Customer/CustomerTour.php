<?php

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Customer\CustomerTour
 *
 * @property integer $customer_id
 * @property integer $tour_id
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Customer\CustomerTour whereCustomerId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Customer\CustomerTour whereTourId($value)
 * @mixin \Eloquent
 */
class CustomerTour extends Model
{
    public $table = 'customer_tour';
}
