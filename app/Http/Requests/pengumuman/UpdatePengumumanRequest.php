<?php

namespace App\Http\Requests\pengumuman;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePengumumanRequest extends FormRequest
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
        $oldData = json_decode(html_entity_decode($this->input('pengumumanOld')), true);

        $this->request->replace($this->only([
            'judul',
            'tanggal',
            'nomor',
            'perihal',
            'kepada',
            'content',
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
                'max:100'
            ],
            'tanggal' => [
                'bail',
                'string',
                'max:20'
            ],
            'nomor' => [
                'bail',
                'string',
                'max:50'
            ],
            'perihal' => [
                'bail',
                'string',
                'max:50'
            ],
            'kepada' => [
                'bail',
                'string',
                'max:50'
            ],
            'content' => [
                'bail',
                'string'
            ],
        ];
    }
}
