<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGamesRequest extends FormRequest
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
            
            'name' => 'required|unique:games,name,'.$this->route('game'),
            'owner_id' => 'required',
            'players.*' => 'exists:players,id',
            'is_active' => 'required',
            'results.*' => 'exists:results,id',
        ];
    }
}
