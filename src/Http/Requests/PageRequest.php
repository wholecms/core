<?php

namespace Whole\Core\Http\Requests;

use App\Http\Requests\Request;

class PageRequest extends Request
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
        $rules =  [
            'content_page_id'=>'required',
            'content_type'=>'required',
            'menu_title'=>'required',
        ];

        //Create Content Request
        if ($this->get('content_type')=='content')
        {
            if ($this->get('content_id')=="")
            {
                $rules =  [
                    'create_content_title' => 'required',
                    'create_content_content' => 'required',
                ];
            }
        }

        //Select Component ID
        if ($this->get('content_type')=='component')
        {
            $rules =  [
                'component_id' => 'required',
            ];
        }

        //Select Component ID
        if ($this->get('content_type')=='link')
        {
            $rules =  [
                'external_link' => 'required',
            ];
        }

        return $rules;
    }

    public function messages()
    {

        return [
            'content_page_id.required'=> trans('whole::request/page.content_page_id'),
            'menu_title.required'=> trans('whole::request/page.menu_title'),
            'content_type.required'=> trans('whole::request/page.content_type'),
            'create_content_title.required' => trans('whole::request/page.create_content_title'),
            'create_content_content.required' => trans('whole::request/page.create_content_content'),
            'component_id.required' => trans('whole::request/page.component_id'),
            'external_link.required' => trans('whole::request/page.external_link'),
        ];
    }
}
