<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Rules\UserVerifyValidate;

class UserRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            'name'      => 'required',
            'email'     => [
                'required',
                'email:dns',
                new UserVerifyValidate($request)
            ],
            'phone'     => 'required|numeric|digits:10',
            'password'  => [
                'required',
                'min:8',
                'regex:/^(?=.*[a-zA-Z])(?=.*[0-9]).+$/',

            ],
        ];
    }
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response() ->json([
            'erros' => [
                'status'    => false,
                'code'      => Response::HTTP_UNPROCESSABLE_ENTITY,
                'message'   => $validator->errors()
            ]
        ]));
    }
    public function messages()
    {
        //custom in resource/lang/validation
        return [
//            'name.required' => 'None',
        ];
    }
}
