<?php

namespace App\Http\Requests\alamat;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAlamatRequest extends FormRequest
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
        $oldData = json_decode(html_entity_decode($this->input('alamat_warga')), true);

        $this->request->replace($this->only([
            'alamat',
            'rt',
        ]));

        $this->request->replace($this->only(array_keys(array_diff_assoc($this->request->all(), $oldData))));
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
                'string',
                'max:50',
            ],
            'rt' => [
                'bail',
                Rule::in(['RT 1', 'RT 2', 'RT 3', 'RT 4', 'RT 5'])
            ],
        ];
    }
}
