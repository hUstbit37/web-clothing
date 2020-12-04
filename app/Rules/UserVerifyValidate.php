<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Repositories\UserRepository;

class UserVerifyValidate implements Rule
{
    private $input;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($input)
    {
        $this->input = $input;
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
        $userId = $this->input->route('user');
        if(!$userId){
            return ! app(UserRepository::class)->isVerify( $this->input['email']);
        }
        return ! app(UserRepository::class)->checkEmailUpdate( $this->input['email'], $userId);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Email đã tồn tại';
    }
}
