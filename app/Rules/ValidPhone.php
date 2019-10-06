<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidPhone implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (!empty($value)) {
            $nonDigits = [' ', '(', ')', '-', '+'];
            $value = htmlspecialchars($value);
            $digits = str_replace($nonDigits, '', $value);
            if (strlen($digits) >= 10 && strlen($digits) <= 18) {
                return true;
            }
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Lütfen geçerli bir telefon numarası giriniz. !';
    }
}
