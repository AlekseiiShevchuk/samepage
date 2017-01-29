<?php
namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Player
 *
 * @package App
 * @property string $device_id
 * @property string $nickname
*/
class Player extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['device_id', 'nickname'];
    protected $hidden = ['deleted_at','pivot'];
    
    
    public function results()
    {
        return $this->belongsToMany(Result::class, 'player_result')->withTrashed();
    }
    
}
