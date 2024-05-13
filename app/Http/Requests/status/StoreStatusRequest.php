<?php

namespace App\Http\Requests\status;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StoreStatusRequest extends FormRequest
{

    protected $noKK;

    public function __construct(Request $request)
    {
        parent::__construct();
        $this->noKK = $request->noKK;
    }

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
            'status_peran',
            'status_hidup',
            'status_nikah',
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
            'status_peran' => [
                'bail',
                'required',
                Rule::in(['Kepala keluarga', 'Anggota keluarga']),
                'one_head_per_family:' . $this->noKK,
            ],
            'status_hidup' => [
                'bail',
                'required',
                Rule::in(['Hidup', 'Meninggal', 'Pindah'])
            ],
            'status_nikah' => [
                'bail',
                'required',
                Rule::in(['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati'])
            ],
        ];
    }
}
