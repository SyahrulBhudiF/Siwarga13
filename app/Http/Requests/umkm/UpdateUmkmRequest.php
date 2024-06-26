<?php

namespace App\Http\Requests\umkm;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUmkmRequest extends FormRequest
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
        $oldData = json_decode(html_entity_decode($this->input('umkmOld')), true);

        $this->request->replace($this->only([
            'judul',
            'alamat',
            'kategori',
            'harga_awal',
            'harga_akhir',
            'no_telp',
            'content'
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
            'judul' => [
                'bail',
                'string',
                'max:50'
            ],
            'alamat' => [
                'bail',
                'string',
                'max:50'
            ],
            'kategori' => [
                'bail',
                Rule::in(['Kuliner', 'Fashion', 'Kecantikan', 'Agribisnis', 'Otomotif']),
            ],
            'harga_awal' => [
                'bail',
                'numeric',
                'min:500',
            ],
            'harga_akhir' => [
                'bail',
                'numeric',
                'max:10000000',
            ],
            'no_telp' => [
                'bail',
                'numeric',
                'regex:/^08[0-9]{9,10}$/',
            ],
            'content' => [
                'bail',
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
