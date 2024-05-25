<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignInRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array // luat
    {
        return [
            'email' => "required|email:rfc,dns",
            'password' => "required|min:6",
        ];
    }

    public function messages(): array{ // message
        return [
            'email.required' => 'Vui long nhap email',
            'email.email' => 'Email khong dung dinh dang',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
