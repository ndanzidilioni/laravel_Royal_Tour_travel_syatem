<?php

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Customer\CustomerTicket
 *
 * @property integer $id
 * @property integer $customer_id
 * @property integer $agent_id
 * @property string $from
 * @property string $to
 * @property string $departure
 * @property string $class
 * @property integer $qty
 * @property string $note
 * @property float $amount
 * @property boolean $received
 * @property float $payment
 * @property boolean $payed
 * @property boolean $terminated
 * @property string $create
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Customer\CustomerTicket whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Customer\CustomerTicket whereCustomerId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Customer\CustomerTicket whereAgentId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Customer\CustomerTicket whereFrom($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Customer\CustomerTicket whereTo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Customer\CustomerTicket whereDeparture($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Customer\CustomerTicket whereClass($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Customer\CustomerTicket whereQty($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Customer\CustomerTicket whereNote($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Customer\CustomerTicket whereAmount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Customer\CustomerTicket whereReceived($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Customer\CustomerTicket wherePayment($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Customer\CustomerTicket wherePayed($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Customer\CustomerTicket whereTerminated($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Customer\CustomerTicket whereCreate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Customer\CustomerTicket whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Customer\CustomerTicket whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CustomerTicket extends Model
{
    public $guarded = ['id'];
    public $table = 'ticket';
}
