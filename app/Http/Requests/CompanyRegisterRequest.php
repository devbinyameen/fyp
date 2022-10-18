<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
// use LangleyFoxall\LaravelNISTPasswordRules\PasswordRules;
// use App\Rules\Captcha;


class CompanyRegisterRequest extends FormRequest
{
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
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')],
            'cnic' => ['required', 'max:255', Rule::unique('users')],
            'password' => ['min:6', 'same:confirm_password'],
            'confirm_password' => ['required','min:6'],
            'company' => ['required', 'string', 'max:191', Rule::unique('companies','name')],
            'company_email' => ['required', 'email', 'max:191', Rule::unique('companies','email')],
            'company_phone' => ['required', 'string', 'max:191',  Rule::unique('companies', 'phone_number')],
            'company_address' => ['required', 'string', 'max:191'],  
        ];
    }
}
