<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CompleteProfileRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
            if(\Auth::user()->status == 0){
                    return true;
            }

            return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
                'username'=>'required|unique:users|min:8'
        ];
    }
}
