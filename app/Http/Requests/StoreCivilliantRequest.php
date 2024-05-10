<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCivilliantRequest extends FormRequest
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
                'required',
                'numeric',
                'digits:16',
                'unique:warga,nik'
            ],
            'noKK' => [
                'bail',
                'required',
                'numeric',
                'digits:16',
            ],
            'nama' => [
                'bail',
                'required',
                'string',
                'max:100',
            ],
            'jenis_kelamin' => [
                'bail',
                'required',
                Rule::in(['Laki-laki', 'Perempuan']),
            ],
            'agama' => [
                'bail',
                'required',
                Rule::in(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Khonghucu']),
            ],
            'pekerjaan' => [
                'bail',
                'required',
                'string',
                'max:50',
            ],
            'ttl' => [
                'bail',
                'required',
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
