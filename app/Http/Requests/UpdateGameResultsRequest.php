<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGameResultsRequest extends FormRequest
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
            'results.*' => 'exists:results,id',
            'is_owner_etalon' => 'required',
            'for_game_id' => 'required',
            'by_player_id' => 'required',
            'background_height' => 'numeric',
            'background_width' => 'numeric',
        ];
    }
}
