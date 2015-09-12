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
            'title.required' => 'Başlık Alanı Boş Bırakılamaz',
            'content.required' => 'İçerik Alanı Boş Bırakılamaz'
        ];
    }
}
