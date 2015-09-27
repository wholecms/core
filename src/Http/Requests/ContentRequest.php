<?php

namespace Whole\Core\Http\Requests;

use App\Http\Requests\Request;

class ContentRequest extends Request
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
            'title' => 'required',
            'content' => 'required'
        ];
    }


    /**
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' =>trans('whole::request.content.title'),
            'content.required' => trans('whole::request.content.content'),
        ];
    }
}
