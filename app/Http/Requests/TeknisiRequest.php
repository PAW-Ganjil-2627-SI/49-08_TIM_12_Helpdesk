<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeknisiRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama'     => 'required|string|max:255',
            'keahlian' => 'required|string|max:100', // Network / DB / Hardware
            'kontak'   => 'required|string|max:100',
            'user_id'  => 'nullable|exists:users,id',
        ];
    }
}