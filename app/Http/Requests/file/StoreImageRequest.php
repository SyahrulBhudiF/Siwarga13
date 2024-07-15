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
        $files = [
            'file1' => $this->file('file1'),
            'file2' => $this->file('file2'),
            'file3' => $this->file('file3'),
            'file4' => $this->file('file4'),
            'file5' => $this->file('file5'),
            'file6' => $this->file('file6'),
        ];

        $this->replace($files);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'file1' => [
                'bail',
                'required',
                'max:2048',
            ],
            'file2' => [
                'bail',
                'max:2048',
            ],
            'file3' => [
                'bail',
                'max:2048',
            ],
            'file4' => [
                'bail',
                'max:2048',
            ],
            'file5' => [
                'bail',
                'max:2048',
            ],
            'file6' => [
                'bail',
                'max:2048',
            ],
        ];
    }
}
