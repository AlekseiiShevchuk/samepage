<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGamesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:games,name',
            'players.*' => 'exists:players,id',
            'is_active' => 'required',
            'scenario_id' => 'required',
            'game_results.*' => 'exists:game_results,id',
        ];
    }
}
