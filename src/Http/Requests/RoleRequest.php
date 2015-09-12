<?php

namespace Whole\Core\Http\Requests;

use App\Http\Requests\Request;

class RoleRequest extends Request
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
            'role_name' => 'required',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'role_name.required' => 'Grup Adı Boş Bırakılamaz',
        ];
    }
}
