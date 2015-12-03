<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class FixtureRequest extends Request
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
        return [
                'home_club_id' => 'required',
                'away_club_id' => 'required',
                'gameweek_id'=>'required',
                'kickoff'=>'required'
        ];
    }
}
