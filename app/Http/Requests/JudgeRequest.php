<?php namespace Contest\Http\Requests;

use Contest\Http\Requests\Request;

class JudgeRequest extends Request
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
            'judgePub' => 'required',
            'judgeUnpub' => 'required',
            'judgeEitherNotBoth' => 'required',
            'mainstream' => 'required',
            'category' => 'required',
            'historical' => 'required',
            'singleTitle' => 'required',
            'paranormal' => 'required',
            'inspirational' => 'required',
            'maxpubentries' => 'required',
            'maxunpubentries' => 'required',
            'judgeThisYear' => 'required',
        ];
    }

}

