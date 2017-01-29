<?php
namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Image
 *
 * @package App
 * @property string $name
 * @property string $description
 * @property string $image
*/
class Image extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['name', 'description', 'image'];

    protected $hidden = ['deleted_at','updated_at','created_at','pivot'];
}
