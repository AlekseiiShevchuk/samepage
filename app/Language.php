<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Language
 *
 * @package App
 * @property string $abbreviation
 * @property string $name
 * @property tinyInteger $is_active_for_admin
 * @property tinyInteger $is_active_for_users
 * @property string $flag_image
*/
class Language extends Model
{
    protected $fillable = ['abbreviation', 'name', 'is_active_for_admin', 'is_active_for_users', 'flag_image'];

    static function getAvailableColumnsForTranslationItems()
    {
        $columns[] = 'value_name';
        foreach (Language::where('is_active_for_users',1)->pluck('abbreviation') as $abbr){
            $columns[] = 'value_' . $abbr;
        }

        return $columns;
    }
    
}
