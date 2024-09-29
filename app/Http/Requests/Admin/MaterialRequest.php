<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class MaterialRequest extends FormRequest
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
            'title' => 'required|string',
            'content' => 'required',
            'insight' => 'required',
            'question' => 'required',
            'summary' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'judul materi harus diisi',
            'content.required' => 'Konten harus diisi',
            'insight.required' => 'Wawasan harus diisi',
            'question.required' => 'Pertanyaan pemantik harus diisi',
            'summary.required' => 'Ringkasan harus diisi',
        ];
    }
}
