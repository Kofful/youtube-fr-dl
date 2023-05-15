<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class FragmentFileNameRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param string $attribute
     * @param mixed $value
     * @param Closure $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (is_string($value)) {
            $fragmentsStoragePath = env('FRAGMENTS_STORAGE');
            $fragmentFilePath = $fragmentsStoragePath . $value;

            if (!file_exists($fragmentFilePath)) {
                $fail('The file  does not exist');
            }
        }
    }
}
