<?php

namespace Whole\Core\Http\Requests;

use App\Http\Requests\Request;

class ComponentRequest extends Request
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
            'file' => 'required|mimes:zip',
        ];
    }

    public function messages()
    {
        return [
            'file.required' => trans('whole::request.component.file_required'),
            'file.mimes' => trans('whole::request.component.file_mimes'),
        ];
    }
}
