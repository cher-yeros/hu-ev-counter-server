<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class TesebakiTyped implements Rule
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
        $types = ['yetemelese','tesfa-yesete','yesema','yetekebele'];
        $found = false;

        foreach ($types as $key => $type) {
            if($value == $type){
                $found = true;
            }
        }
        return $found;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Invalid type of tesebaki is sent!';
    }
}
