<?php

namespace App\Models\Agent;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Agent\Agent
 *
 * @property integer $id
 * @property string $registered
 * @property string $name
 * @property string $number
 * @property string $email
 * @property boolean $terminated
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Agent\Agent whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Agent\Agent whereRegistered($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Agent\Agent whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Agent\Agent whereNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Agent\Agent whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Agent\Agent whereTerminated($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Agent\Agent whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Agent\Agent whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Agent extends Model
{
    public $guarded = ['id'];
    public  $table ='agent';
}
