<?php
namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Result
 *
 * @package App
 * @property integer $x_coordinate
 * @property integer $y_coordinate
 * @property integer $rotary_angle
 * @property string $for_image
 * @property string $by_player
 * @property string $for_game
 * @property tinyInteger $owner_base_result
*/
class Result extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['x_coordinate', 'y_coordinate', 'rotary_angle', 'owner_base_result', 'for_image_id', 'by_player_id', 'for_game_id'];
    

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setXCoordinateAttribute($input)
    {
        $this->attributes['x_coordinate'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setYCoordinateAttribute($input)
    {
        $this->attributes['y_coordinate'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setRotaryAngleAttribute($input)
    {
        $this->attributes['rotary_angle'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setForImageIdAttribute($input)
    {
        $this->attributes['for_image_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setByPlayerIdAttribute($input)
    {
        $this->attributes['by_player_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setForGameIdAttribute($input)
    {
        $this->attributes['for_game_id'] = $input ? $input : null;
    }
    
    public function for_image()
    {
        return $this->belongsTo(Image::class, 'for_image_id')->withTrashed();
    }
    
    public function by_player()
    {
        return $this->belongsTo(Player::class, 'by_player_id')->withTrashed();
    }
    
    public function for_game()
    {
        return $this->belongsTo(Game::class, 'for_game_id')->withTrashed();
    }
    
}
