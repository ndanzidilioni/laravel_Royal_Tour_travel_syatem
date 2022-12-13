<?php

namespace App\Models\Advertisements;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Advertisements\Feedback
 *
 * @mixin \Eloquent
 * @property integer $id
 * @property string $subject
 * @property string $name
 * @property string $email
 * @property integer $contact
 * @property string $comment
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Advertisements\Feedback whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Advertisements\Feedback whereSubject($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Advertisements\Feedback whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Advertisements\Feedback whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Advertisements\Feedback whereContact($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Advertisements\Feedback whereComment($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Advertisements\Feedback whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Advertisements\Feedback whereUpdatedAt($value)
 */

class Feedback extends Model
{
    //
    public $table = "feedback";
    protected $guarded = ['id'];


}
