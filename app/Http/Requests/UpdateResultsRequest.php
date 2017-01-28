<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateResultsRequest extends FormRequest
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
            
            'x_coordinate' => 'required',
            'y_coordinate' => 'required',
            
            'for_image_id' => 'required',
            'by_player_id' => 'required',
            'for_game_id' => 'required',
            'owner_base_result' => 'required',
        ];
    }
}
