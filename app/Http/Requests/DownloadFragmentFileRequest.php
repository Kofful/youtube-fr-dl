<?php

namespace App\Http\Requests;

use App\Rules\FragmentFileNameRule;
use Illuminate\Foundation\Http\FormRequest;

class DownloadFragmentFileRequest extends FormRequest
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
            'fileName' => ['required', 'string', new FragmentFileNameRule],
        ];
    }
}
