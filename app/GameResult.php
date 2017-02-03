<?php
namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GameResult
 *
 * @package App
 * @property tinyInteger $is_owner_etalon
 * @property string $for_game
 * @property string $by_player
*/
class GameResult extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['is_owner_etalon', 'for_game_id', 'by_player_id','background_height','background_width'];
    protected $hidden = ['deleted_at'];
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setForGameIdAttribute($input)
    {
        $this->attributes['for_game_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setByPlayerIdAttribute($input)
    {
        $this->attributes['by_player_id'] = $input ? $input : null;
    }
    
    public function results()
    {
        return $this->belongsToMany(Result::class, 'game_result_result')->withTrashed();
    }
    
    public function for_game()
    {
        return $this->belongsTo(Game::class, 'for_game_id')->withTrashed();
    }
    
    public function by_player()
    {
        return $this->belongsTo(Player::class, 'by_player_id')->withTrashed();
    }
    
}
