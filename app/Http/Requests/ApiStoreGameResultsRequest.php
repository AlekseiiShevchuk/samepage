<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApiStoreGameResultsRequest extends FormRequest
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
            'is_owner_etalon' => 'required',
            'for_game_id' => 'required|exists:games,id',
            'background_height' => 'required|numeric',
            'background_width' => 'required|numeric',
        ];
    }
}
