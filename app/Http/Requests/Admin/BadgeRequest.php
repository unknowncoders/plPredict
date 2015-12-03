<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class BadgeRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
                'name' => 'required',
                'description'=>'required',
        ];

        if($this->path() == 'admin/badge'){
            $rules['name'] = 'required|unique:badges';
        }

        return $rules;
    }
}
