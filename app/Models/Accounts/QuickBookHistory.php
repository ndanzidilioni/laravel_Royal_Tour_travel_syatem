<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Accounts\QuickBookHistory
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $quickbook_id
 * @property string $action
 * @property string $changed_time
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\QuickBookHistory whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\QuickBookHistory whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\QuickBookHistory whereQuickbookId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\QuickBookHistory whereAction($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\QuickBookHistory whereChangedTime($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\QuickBookHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Accounts\QuickBookHistory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class QuickBookHistory extends Model
{
    public $guarded = ['id'];
}
