<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class AssignmentRequest extends FormRequest
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
            'team' => ['required', 'string', 'max:255'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:5126'],
            'description' => ['required', 'string'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'team.required' => 'Nama Kelompok harus diisi',
            'team.string' => 'Kelompok harus berupa string',
            'image.required' => 'Poster harus diisi',
            'image.image' => 'Poster harus berupa gambar',
            'image.mimes' => 'Poster harus berformat jpeg, png, jpg, gif, svg',
            'image.max' => 'Poster maksimal berukuran 5MB',
            'description.required' => 'Deskripsi harus diisi',
            'description.string' => 'Deskripsi harus berupa string',
        ];
    }
}
