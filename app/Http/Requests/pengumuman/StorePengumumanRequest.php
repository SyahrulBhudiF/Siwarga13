<?php

namespace App\Http\Requests\pengumuman;

use Illuminate\Foundation\Http\FormRequest;

class StorePengumumanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->request->replace($this->only([
            'judul',
            'tanggal',
            'nomor',
            'perihal',
            'kepada',
            'content',
        ]));
        $this->merge([
            'penerbit' => auth()->user()->name,
        ]);
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
                'max:100'
            ],
            'tanggal' => [
                'bail',
                'required',
                'string',
                'max:20'
            ],
            'nomor' => [
                'bail',
                'required',
                'string',
                'max:50'
            ],
            'perihal' => [
                'bail',
                'required',
                'string',
                'max:50'
            ],
            'kepada' => [
                'bail',
                'required',
                'string',
                'max:50'
            ],
            'content' => [
                'bail',
                'required',
                'string'
            ],
        ];
    }
}
