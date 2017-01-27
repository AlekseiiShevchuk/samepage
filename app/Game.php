<?php
namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Game
 *
 * @package App
 * @property string $name
 * @property string $game_id
 * @property string $owner
 * @property tinyInteger $is_active
*/
class Game extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['name', 'game_id', 'is_active', 'owner_id'];
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setOwnerIdAttribute($input)
    {
        $this->attributes['owner_id'] = $input ? $input : null;
    }
    
    public function owner()
    {
        return $this->belongsTo(Player::class, 'owner_id')->withTrashed();
    }
    
    public function players()
    {
        return $this->belongsToMany(Player::class, 'game_player')->withTrashed();
    }
    
    public function results()
    {
        return $this->belongsToMany(GameResult::class, 'game_game_result')->withTrashed();
    }
    
}
