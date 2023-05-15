<?php

namespace App\Http\Requests;

use App\Rules\FragmentTimeRule;
use Illuminate\Foundation\Http\FormRequest;

class GetFragmentRequest extends FormRequest
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
     * @return array
     */
    public function rules(): array
    {
        return [
            'start' => ['required', 'string', new FragmentTimeRule],
            'end' => ['required', 'string', new FragmentTimeRule],
            'url' => ['required', 'string'],
        ];
    }
}
