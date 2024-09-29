<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class VideoRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'    => 'required|string',
            'thumbnail' => 'required|mimes:png,jpg,jpeg|max:5126',
            'url' => 'string|required|min:8',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Judul harus diisi',
            'thumbnail.required' => 'Thumbnail harus diisi',
            'thumbnail.mimes' => 'Thumbnail harus berupa png/jpg/jpeg',
            'thumbnail.max' => 'Thumbnail tidak boleh dari 5MB',
            'url.required' => 'URL harus diisi',
        ];
    }
}
