<?php

namespace App\Http\Requests\civilliant;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCivilliantRequest extends FormRequest
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
        $oldData = json_decode(html_entity_decode($this->input('civilliant')), true);

        $this->merge([
            'ttl' => $this->input('tempat_lahir') . ', ' . $this->input('tanggal')]);
        $this->request->replace($this->only([
            'nik',
            'noKK',
            'nama',
            'jenis_kelamin',
            'agama',
            'pekerjaan',
            'pendapatan',
            'ttl'
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
            'nik' => [
                'bail',
                'numeric',
                'digits:16',
                'unique:warga,nik'
            ],
            'noKK' => [
                'bail',
                'numeric',
                'digits:16',
            ],
            'nama' => [
                'bail',
                'string',
                'max:100',
            ],
            'jenis_kelamin' => [
                'bail',
                Rule::in(['Laki-laki', 'Perempuan']),
            ],
            'agama' => [
                'bail',
                Rule::in(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Khonghucu']),
            ],
            'pekerjaan' => [
                'bail',
                'string',
                'max:50',
            ],
            'ttl' => [
                'bail',
                'string',
                'max:150',
            ],
            'tempat_lahir' => [
                'bail',
                'string',
                'max:50',
            ],
            'tanggal' => [
                'bail',
                'string',
            ],
        ];
    }
}
