<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class ClubRequest extends Request
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
                'logo_id'=>'required',
                'fan_pic_id'=>'required'
        ];

        if($this->path() == 'admin/club'){
            $rules['name'] = 'required|unique:clubs';
        }

        return $rules;

    }
}
