<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreScenariosRequest extends FormRequest
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
            'name' => 'required|unique:scenarios,name',
            'background_id' => 'required_without:background_image',
            'section_id' => 'required',
            'background_image' => 'required_without:background_id',
            'bottom_scale' => 'required|integer|between:1,100',
            'center_scale' => 'required|integer|between:1,100',
            'top_scale' => 'required|integer|between:1,100'
        ];
    }
}
