<?php

namespace App\Rules;

use Closure;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Validation\ValidationRule;

class PasswordCheckRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!Hash::check($value, auth()->user()->password)) {
            $fail('The :attribute is incorrect.');
        }
    }
    public function passes($attribute, $value)
    {
        // Check the old password
        return Hash::check($value, auth()->user()->password);
    }



    public function message()
    {
        return 'The :attribute is incorrect.';
    }

}
