<?php

namespace Whole\Core\Http\Requests;

use App\Http\Requests\Request;

class BlockRequest extends Request
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
            'name'=>'required',
            'title'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Blok Adı Alanı Boş Bırakılamaz',
            'title.required'=>'Blok Başlığı Alanı Boş Bırakılamaz',
        ];
    }
}
