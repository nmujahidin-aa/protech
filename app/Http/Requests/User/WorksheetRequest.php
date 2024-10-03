<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class WorksheetRequest extends FormRequest
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
            'file' => ['required', 'mimes:pdf', 'max:5120'],
            'team_id' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'team_id.required' => 'Id Tim harus diisi',
            'file.required' => 'File harus diisi',
            'file.mimes' => 'File harus berupa pdf',
            'file.max' => 'File tidak boleh lebih dari 5MB',
        ];
    }
}
