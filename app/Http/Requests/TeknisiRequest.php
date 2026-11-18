<?php

namespace App\Http\Requests;

use App\Models\Teknisi;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TeknisiRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $teknisiId = $this->route('teknisi')?->id;

        return [
            'nama'         => ['required', 'string', 'max:255'],
            'spesialisasi' => ['required', Rule::in(Teknisi::SPESIALISASI)],
            'user_id'      => ['nullable', 'exists:users,id', Rule::unique('teknisis', 'user_id')->ignore($teknisiId)],
            'email'        => ['required', 'email', 'max:255'],
            'telepon'      => ['required', 'string', 'max:50'],
            'status'       => ['required', Rule::in(Teknisi::STATUS)],
        ];
    }
}