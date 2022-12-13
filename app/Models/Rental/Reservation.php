<?php

namespace App\Models\Rental;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Rental\Reservation
 *
 * @property integer $id
 * @property integer $vehicle_id
 * @property integer $driver_id
 * @property string $destination
 * @property float $payment
 * @property string $start_date
 * @property string $end_date
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\Rental\Vehicle $vehicle
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Rental\Reservation whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Rental\Reservation whereVehicleId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Rental\Reservation whereDriverId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Rental\Reservation whereDestination($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Rental\Reservation wherePayment($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Rental\Reservation whereStartDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Rental\Reservation whereEndDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Rental\Reservation whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Rental\Reservation whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property integer $customer_id
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Rental\Reservation whereCustomerId($value)
 * @property-read \App\User $driver
 */
class Reservation extends Model
{
    public $guarded=['id'];

    public $dates = ['start_date', 'end_date'];

    public function vehicle()
    {
        return $this->hasOne(Vehicle::class, 'id');
    }

    public function driver()
    {
        return $this->hasOne(User::class, 'id', 'driver_id');
    }


}
