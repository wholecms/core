<?php

namespace Whole\Core\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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

        if ($this->method()=="POST")
        {
            $rules = [
                'name'=>'required',
                'password'=>'required|confirmed',
                'email'=>'required|email|unique:users,email',
                'role'=>'required',
            ];
        }
        elseif($this->method()=="PUT")
        {
            $rules = [
                'name'=>'required',
                'password'=>'confirmed',
                'email'=>'required|email',
                'role'=>'required',
            ];
        }

        return $rules;

    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Adı Soyadı Alanı Boş Bırakılamaz',
            'password.required' => 'Şifre Alanı Boş Bırakılamaz',
            'password.confirmed' => 'Şifre Alanı Şifre Tekrar Alanı İle Aynı Değil',
            'email.required' => 'E-Mail Alanı Boş Bırakılamaz',
            'email.email' => 'Geçerli bir Mail Adresi Girmelisiniz',
            'email.unique' => 'Bu E-Mail Adresi Daha Önce Kullanılmış',
            'role.required' => 'Kullanıcı Grubu Boş Bırakıalamaz',

        ];
    }
}
