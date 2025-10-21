<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
        $usernameField = $this->username();
        return [
            $usernameField => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];
    }
    public function messages(): array
    {
        $usernameField = $this->username();
        
        return [
            "{$usernameField}.required" => 'メールアドレスを入力してください。',
            "{$usernameField}.email" => '有効なメールアドレス形式で入力してください。',
            'password.required' => 'パスワードを入力してください。',
        ];
    }
}