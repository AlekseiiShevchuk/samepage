<?php
namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class Player
 *
 * @package App
 * @property string $device_id
 * @property string $nickname
*/
class Player extends Authenticatable
{
    use SoftDeletes;
    
    protected $fillable = ['nickname','device_token'];
    protected $hidden = ['deleted_at','pivot'];
    
    
    public function results()
    {
        return $this->belongsToMany(Result::class, 'player_result')->withTrashed();
    }
    
}
