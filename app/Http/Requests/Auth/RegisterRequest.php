<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name'=>['required','string','max:191'],
            'email'=>['required','email','min:8','max:191',Rule::unique('users')->ignore($this->user->id),],
            'password'=>['required','min:8','max:191','confirmed',]
            'password_confirmation' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => '名前を入力してください',
            'email.email' => 'メール形式が正しくありません',
            'password.required' =>'パスワードを入力してください',
        ];
    }
}
