<?php

namespace App\Http\Requests\umkm;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUmkmRequest extends FormRequest
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
            'alamat',
            'kategori',
            'harga_awal',
            'harga_akhir',
            'no_telp',
            'content'
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
            'judul' => [
                'bail',
                'required',
                'string',
                'max:50'
            ],
            'alamat' => [
                'bail',
                'required',
                'string',
                'max:50'
            ],
            'kategori' => [
                'bail',
                'required',
                Rule::in(['Kuliner', 'Fashion', 'Kecantikan', 'Agribisnis', 'Otomotif']),
            ],
            'harga_awal' => [
                'bail',
                'required',
                'numeric',
                'min:500',
            ],
            'harga_akhir' => [
                'bail',
                'required',
                'numeric',
                'max:10000000',
            ],
            'no_telp' => [
                'bail',
                'required',
                'numeric',
                'regex:/^08[0-9]{9,10}$/',
            ],
            'content' => [
                'bail',
                'required',
                'string',
            ],
        ];
    }

    protected function passedValidation()
    {
        $this->merge([
            'harga' => 'Rp ' . $this->harga_awal . ' - ' . 'Rp ' . $this->harga_akhir,
        ]);
        $this->request->remove('harga_awal');
        $this->request->remove('harga_akhir');
    }
}
