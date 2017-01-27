<?php
namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Scenario
 *
 * @package App
 * @property string $name
 * @property string $description
 * @property string $background
*/
class Scenario extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['name', 'description', 'background_id'];
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setBackgroundIdAttribute($input)
    {
        $this->attributes['background_id'] = $input ? $input : null;
    }
    
    public function background()
    {
        return $this->belongsTo(Background::class, 'background_id')->withTrashed();
    }
    
    public function images()
    {
        return $this->belongsToMany(Image::class, 'image_scenario')->withTrashed();
    }
    
}
