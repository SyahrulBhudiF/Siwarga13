<?php

namespace App\Http\Requests\dokumentasi;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDokumentasiRequest extends FormRequest
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
        $oldData = json_decode(html_entity_decode($this->input('dokumentasiOld')), true);

        $this->request->replace($this->only([
            'judul',
            'tanggal',
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
                'max:50'
            ],
            'tanggal' => [
                'bail',
                'string',
                'max:50'
            ],
            'content' => [
                'bail',
                'string',
            ],
        ];
    }
}
