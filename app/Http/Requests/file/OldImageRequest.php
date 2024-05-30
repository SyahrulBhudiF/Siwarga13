<?php

namespace App\Http\Requests\file;

use Illuminate\Foundation\Http\FormRequest;

class OldImageRequest extends FormRequest
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
            'file1Old',
            'file2Old',
            'file3Old',
            'file4Old',
            'file5Old',
            'file6Old',
        ]));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
        ];
    }
}
