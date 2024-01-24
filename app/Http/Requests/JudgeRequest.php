<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class JudgeRequest extends FormRequest
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
            'user_id' => 'required',
            'mainstream' => 'required',
            'shortTitle' => 'required',
            'historical' => 'required',
            'longTitle' => 'required',
            'paranormal' => 'required',
            'novella' => 'required',
            'cozy' => 'required',
            'maxpubentries' => 'required',
            'maxunpubentries' => 'required',
            'judgeThisYear' => 'required',
            'emergencyJudgeUnpub' => 'required',
            'emergencyJudgePub' => 'required',

        ];
    }

}

