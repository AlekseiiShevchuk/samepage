<?php
namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Background
 *
 * @package App
 * @property string $name
 * @property string $description
 * @property string $background_image
*/
class Background extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['name', 'description', 'background_image'];

    protected $hidden = ['deleted_at','updated_at','created_at','pivot'];
    
    
}
