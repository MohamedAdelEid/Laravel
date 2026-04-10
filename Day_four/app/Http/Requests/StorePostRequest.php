<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'user_id' => 'required|exists:users,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            "title.required" => "عنوان المقالة مطلوب",
            "title.max" => "عنوان المقالة يجب أن لا يتجاوز 255 حرفاً",
            "body.required" => "محتوي المقالة مطلوب",
            "user_id.required" => "المستخدم مطلوب",
            "user_id.exists" => "المستخدم غير موجود",
            "image.image" => "الملف يجب أن يكون صورة",
            "image.mimes" => "الصورة يجب أن تكون من نوع: jpeg, png, jpg, gif",
            "image.max" => "الصورة يجب أن لا تتجاوز 2MB",
        ];
    }
}