<?php

namespace App\Http\Requests;

use App\Actions\Fortify\PasswordValidationRules;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    use PasswordValidationRules;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['string', 'required', 'max:255'],
            'email' => ['string', 'required', 'max:255', 'email', 'unique:users'],
            'password' => $this->passwordRules(),
            'address' => ['string', 'required'],
            'houseNumber' => ['string', 'required', 'max:255'],
            'phoneNumber' => ['string', 'required', 'max:255'],
            'city' => ['string', 'required', 'max:255'],
            'roles' => ['string', 'required', 'in:USER,ADMIN'],
        ];
    }
}
