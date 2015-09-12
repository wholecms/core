<?php

namespace Whole\Core\Http\Requests;

use App\Http\Requests\Request;

class TemplateRequest extends Request
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
            'file.required' => 'Şablon Dosyası Alanı Boş Bırakılamaz',
            'file.mimes' => 'İzin Verilen Dosya Formatı Zip Olmalıdır',
        ];
    }
}
