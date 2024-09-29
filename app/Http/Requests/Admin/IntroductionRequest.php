<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class IntroductionRequest extends FormRequest
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
            'purpose' => 'required',
            'guide' => 'required',
            'stage' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'purpose.required' => 'Tujuan Pembelajaran harus diisi',
            'guide.required' => 'Panduan Penggunaan Media harus diisi',
            'stage.required' => 'Tahapan Kegiatan Pembelajaran harus diisi',
        ];
    }
}
