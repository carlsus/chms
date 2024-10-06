<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class E2ERequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'batch_no' => ['required', 'string', 'max:255'],
            'facilitator' => ['required']

        ];
    }
}
