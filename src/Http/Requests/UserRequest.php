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
            'name.required' => trans('whole::request/user.name'),
            'password.required' => trans('whole::request/user.password_required'),
            'password.confirmed' => trans('whole::request/user.password_confirmed'),
            'email.required' => trans('whole::request/user.email_required'),
            'email.email' => trans('whole::request/user.email_email'),
            'email.unique' => trans('whole::request/user.email_unique'),
            'role.required' => trans('whole::request/user.role'),
        ];
    }
}
