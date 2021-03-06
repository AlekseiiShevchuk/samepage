<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateScenariosRequest extends FormRequest
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
            
            'name' => 'required|unique:scenarios,name,'.$this->route('scenario'),
            'background_id' => 'required',
            'section_id' => 'required',
            'bottom_scale' => 'required|integer|between:1,100',
            'center_scale' => 'required|integer|between:1,100',
            'top_scale' => 'required|integer|between:1,100'
        ];
    }
}
