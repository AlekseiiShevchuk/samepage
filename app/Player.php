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
    
    
    public function results()
    {
        return $this->belongsToMany(GameResult::class, 'game_result_player')->withTrashed();
    }
    
}
