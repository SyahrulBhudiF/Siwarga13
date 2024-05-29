<?php

namespace App\Http\Requests\dokumentasi;

use Illuminate\Foundation\Http\FormRequest;

class StoreDokumentasiRequest extends FormRequest
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
            'judul' => [
                'bail',
                'required',
                'string',
                'max:50'
            ],
            'tanggal' => [
                'bail',
                'required',
                'string',
                'max:50'
            ],
            'content' => [
                'bail',
                'required',
                'string',
            ],
        ];
    }
}
