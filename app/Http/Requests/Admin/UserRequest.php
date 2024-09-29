<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email'    => ['required','email','unique:users,email,' . $this->id],
            'name' => 'required',
            'password' => 'nullable|min:8',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Email harus diisi',
            'name.required' => 'Nama harus diisi',

        ];
    }
}
