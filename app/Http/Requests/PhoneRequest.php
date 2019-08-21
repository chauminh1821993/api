<?php

namespace App\Http\Requests;

use App\Helpers\ResCodes;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Validation\ValidationException;

class PhoneRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @param Request $request
     * @return array
     */
    public function rules(Request $request)
    {
        return [
            'phone' => 'required|regex:/(0)[0-9]{9}/|max:12',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'phone.required' => 'Phone is required',
            'phone.regex' => 'Phone must be numeric',
            'phone.max' => 'Phone contain max 12 charter'
        ];
    }

    /**
     * handle response validate
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(response()->json(
            [
                'status' => ResCodes::STATUS_NOT_OK,
                'errors' => $errors
            ], ResCodes::UNPROCESSABLE_ENTITY));
    }
}
