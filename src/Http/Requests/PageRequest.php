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
            'content_page_id.required'=>'Şablon Sayfası Alanı Boş Bırakılamaz',
            'menu_title.required'=>'Menü Başlığı Alanı Boş Bırakılamaz',
            'content_type.required'=>'Sayfa Tipi Alanı Boş Bırakılamaz',
            'create_content_title.required' => 'Yeni İçerik İçin İçeirk Başlığı Alanı Boş Bırakılamaz',
            'create_content_content.required' => 'Yeni İçerik İçin İçeirk Alanı Boş Bırakılamaz',
            'component_id.required' => 'Bileşen Alanı Boş Bırakılamaz',
            'external_link.required' => 'Dış Bağlantı (Link) Alanı Boş Bırakılamaz',
        ];
    }
}
