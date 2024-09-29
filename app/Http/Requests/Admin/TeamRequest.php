<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'user_id' => 'required|array',
            'user_id.*' => 'exists:users,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama tim wajib diisi',
            'name.string' => 'Nama tim harus berupa string',
            'name.max' => 'Nama tim maksimal 255 karakter',
            'description.string' => 'Deskripsi harus berupa string',
            'user_id.required' => 'Anggota tim wajib diisi',
            'user_id.array' => 'Anggota tim harus berupa array',
            'user_id.*.exists' => 'Anggota tim tidak valid',
        ];
    }
}
