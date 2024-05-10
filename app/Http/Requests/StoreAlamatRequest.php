<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAlamatRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->request->replace($this->only([
            'alamat',
            'rt',
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
            'alamat' => [
                'bail',
                'required',
                'string',
                'max:50',
            ],
            'rt' => [
                'bail',
                'required',
                Rule::in(['RT 1', 'RT 2', 'RT 3', 'RT 4', 'RT 5'])
            ],
        ];
    }
}
