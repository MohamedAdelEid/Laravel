<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "email" => "required|email|unique:users,email",
            "password" => "required|min:8",
            "name" => "required|string|max:255",
        ];
    }

    public function messages()
    {
        return [
            "email.required" => "البريد الالكتروني مطلوب",
            "email.email" => "البريد الالكتروني غير صحيح",
            "email.unique" => "البريد الالكتروني موجود بالفعل",
            "password.required" => "كلمة المرور مطلوبة",
            "password.min" => "كلمة المرور يجب أن تكون 8 أحرف على الأقل",
            "name.required" => "الاسم مطلوب",
            "name.max" => "الاسم يجب أن لا يتجاوز 255 حرفاً",
        ];
    }
}