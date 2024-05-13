<?php

namespace App\Http\Requests\status;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UpdateStatusRequest extends FormRequest
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

    protected function prepareForValidation()
    {
        $oldData = json_decode(html_entity_decode($this->input('status_warga')), true);

        $this->request->replace($this->only([
            'status_peran',
            'status_hidup',
            'status_nikah',
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
            'status_peran' => [
                'bail',
                Rule::in(['Kepala keluarga', 'Anggota keluarga']),
                'one_head_per_family:' . $this->noKK,
            ],
            'status_hidup' => [
                'bail',
                Rule::in(['Hidup', 'Meninggal', 'Pindah'])
            ],
            'status_nikah' => [
                'bail',
                Rule::in(['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati'])
            ],
        ];
    }
}
