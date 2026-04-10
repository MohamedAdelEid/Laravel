<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            "title" => "sometimes|string|max:255",
            "body" => "sometimes|string",
            "user_id" => "sometimes|exists:users,id",
            "image" => "nullable|image|mimes:jpeg,png,jpg,gif|max:2048",
        ];
    }

    public function messages(): array
    {
        return [
            "title.max" => "عنوان المقالة يجب أن لا يتجاوز 255 حرفاً",
            "user_id.exists" => "المستخدم غير موجود",
            "image.image" => "الملف يجب أن يكون صورة",
            "image.mimes" => "الصورة يجب أن تكون من نوع: jpeg, png, jpg, gif",
            "image.max" => "الصورة يجب أن لا تتجاوز 2MB",
        ];
    }
}
