<?php

namespace App\Http\Requests\file;

use Illuminate\Foundation\Http\FormRequest;

class StoreImageRequest extends FormRequest
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
        $this->request->replace([
            'file[]'
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
            'file' => [
                'bail',
                'array',
                'max:6',
            ],
            'file.*' => [
                'bail',
                'image',
                'mimes:jpg,jpeg,png',
                'max:5120'
            ]
        ];
    }
}
