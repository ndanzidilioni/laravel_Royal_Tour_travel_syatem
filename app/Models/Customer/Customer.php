<?php

namespace App\Models\Customer;

use App\Models\Loyalty\Loyalty;
use App\Models\Package\Package;
use App\Models\Tour\Tour;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Customer\customer
 *
 * @mixin \Eloquent
 * @property integer $id
 * @property string $fname
 * @property string $sname
 * @property string $lname
 * @property string $otherName
 * @property integer $age
 * @property string $dob
 * @property string $number
 * @property string $nic
 * @property string $passport
 * @property string $address1
 * @property string $address2
 * @property string $loyalty
 * @property boolean $terminated
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Customer\Customer whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Customer\Customer whereFname($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Customer\Customer whereSname($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Customer\Customer whereLname($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Customer\Customer whereOtherName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Customer\Customer whereAge($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Customer\Customer whereDob($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Customer\Customer whereNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Customer\Customer whereNic($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Customer\Customer wherePassport($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Customer\Customer whereAddress1($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Customer\Customer whereAddress2($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Customer\Customer whereLoyalty($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Customer\Customer whereTerminated($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Customer\Customer whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Customer\Customer whereUpdatedAt($value)
 * @property boolean $gender
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Customer\Customer whereGender($value)
 * @property integer $loyalty_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tour\Tour[] $tours
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Package\Package[] $packages
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Customer\CustomerPackage[] $payments
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Customer\Customer whereLoyaltyId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Customer\Customer whereAddress($value)
 * @property boolean $tour
 * @property boolean $ticketing
 * @property boolean $rental
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Customer\Customer whereTour($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Customer\Customer whereTicketing($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Customer\Customer whereRental($value)
 * @property string $address
 */
class Customer extends Model
{
    public $guarded = ['id'];

    /**
     * Get the tours belongs to customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tours()
    {
        return $this->belongsToMany(Tour::class, 'customer_tour', 'tour_id', 'customer_id');
    }

    /**
     * Get the packages related to user ( through tour )
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function packages()
    {
        return $this->hasManyThrough(Package::class, Tour::class, 'package_id', 'id');
    }

    public function loyalty()
    {
        return $this->hasOne(Loyalty::class, 'id');
    }

    /**
     * Get the payments related to customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function payments()
    {
        return $this->hasMany(CustomerPackage::class, 'customer_id', 'id');
    }
}
