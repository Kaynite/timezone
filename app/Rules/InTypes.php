<?php

namespace App\Rules;

use App\Models\UserType;
use Illuminate\Contracts\Validation\Rule;

class InTypes implements Rule
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
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $allTypes = UserType::select('id')->get()->pluck('id')->all();        
        return in_array($value, $allTypes);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The user type is not defined.';
    }
}
