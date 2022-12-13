<?php

namespace App\Models\Tour;

use App\Models\Customer\Customer;
use App\Models\Package\Package;
use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Tour\Tour
 *
 * @property integer $id
 * @property integer $package_id
 * @property string $name
 * @property string $departure
 * @property string $time
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tour\Tour whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tour\Tour wherePackageId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tour\Tour whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tour\Tour whereDeparture($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tour\Tour whereTime($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tour\Tour whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tour\Tour whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tour\Tour whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property integer $hotel_id
 * @property integer $guide_id
 * @property integer $coustomer_count
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tour\Tour whereHotelId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tour\Tour whereGuideId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tour\Tour whereCoustomerCount($value)
 * @property string $code
 * @property string $arrival
 * @property string $departure_time
 * @property string $arrival_time
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $guides
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tour\Hotel[] $hotels
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tour\Tour whereCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tour\Tour whereArrival($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tour\Tour whereDepartureTime($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tour\Tour whereArrivalTime($value)
 * @property-read \App\Models\Package\Package $package
 * @property-read mixed $selected_package
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Customer\Customer[] $customers
 */
class Tour extends Model
{
    public $table = 'tours';

    public $guarded = ['id'];

    /**
     * Get all customers related to a tour
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function guides()
    {
        return $this->belongsToMany(User::class, 'tour_guides', 'tour_id', 'guide_id');
    }

    /**
     * Get all hotel belongs to a tour
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function hotels()
    {
        return $this->belongsToMany(Hotel::class, 'tour_hotels', 'tour_id', 'hotel_id');
    }

    /**
     * Get Package of the tour
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function package()
    {
        return $this->hasOne(Package::class, 'id', 'package_id');
    }

    /**
     * Get package id of a tour [ for display in select box (multiple) ]
     *
     * @return mixed
     */
    public function getSelectedPackageAttribute()
    {
        return $this->package->id;
    }

    public function customers()
    {
        return $this->belongsToMany(Customer::class, 'customer_tour', 'tour_id', 'customer_id');
    }

}
