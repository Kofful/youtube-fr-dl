<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Carbon;

class FragmentTimeRule implements ValidationRule
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
            if (!Carbon::hasFormat($value, 'H:i:s.v') && !Carbon::hasFormat($value, 'H:i:s')) {
                $fail('The :attribute must have one of the following formats: `hh:mm:ss.SSS`, `hh:mm:ss`');
            }
        }
    }
}
