<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

abstract class ApiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    abstract public function authorize();


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
   abstract  public function rules();

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        if (!empty($errors))
        {
            $ErrorList=[];
            foreach ($errors as $key=>$messgae)
            {
                $ErrorList=[
                    $key=>$messgae[0]
                ];
            }
            throw new HttpResponseException(
                response()->json(
                    [
                        'errors messages'=>$ErrorList
                    ],
                    400
                )
            );

        }

    }

}
