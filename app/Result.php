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
*/
class Result extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['x_coordinate', 'y_coordinate', 'rotary_angle', 'for_image_id'];
    protected $hidden = ['deleted_at','updated_at','created_at','pivot'];

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
    
    public function for_image()
    {
        return $this->belongsTo(Image::class, 'for_image_id')->withTrashed();
    }
    
}
