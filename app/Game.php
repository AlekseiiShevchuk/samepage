<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Game
 *
 * @package App
 * @property string $name
 * @property string $owner
 * @property tinyInteger $is_active
 * @property string $owner_etalon_result
 * @property string $scenario
 */
class Game extends Model
{
    const CREATING = 'creating';
    const STARTED = 'started';
    use SoftDeletes;

    protected $fillable = ['name', 'is_active', 'owner_id', 'owner_etalon_result_id', 'scenario_id','time_limit'];

    protected $hidden = ['deleted_at'];

    /**
     * Set to null if empty
     * @param $input
     */
    public function setOwnerIdAttribute($input)
    {
        $this->attributes['owner_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setOwnerEtalonResultIdAttribute($input)
    {
        $this->attributes['owner_etalon_result_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setScenarioIdAttribute($input)
    {
        $this->attributes['scenario_id'] = $input ? $input : null;
    }

    public function owner()
    {
        return $this->belongsTo(Player::class, 'owner_id')->withTrashed();
    }

    public function players()
    {
        return $this->belongsToMany(Player::class, 'game_player')->withTrashed();
    }

    public function owner_etalon_result()
    {
        return $this->belongsTo(GameResult::class, 'owner_etalon_result_id')->withTrashed();
    }

    public function scenario()
    {
        return $this->belongsTo(Scenario::class, 'scenario_id')->withTrashed();
    }

    public function game_results()
    {
        return $this->belongsToMany(GameResult::class, 'game_game_result')->withTrashed();
    }

}
