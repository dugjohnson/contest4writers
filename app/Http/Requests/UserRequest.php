<?php namespace Contest\Http\Requests;

use Contest\Http\Requests\Request;

class UserRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //todo: Work on better authorization. None now
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
            'firstName' => 'required',
            'email' => 'required|email',
            'lastName' => 'required',
            'phone1' => 'required',
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipCode' => 'required',];
    }

    /**
     * Get the sanitized input for the request.
     *
     * @return array
     */
    public function sanitize()
    {
        return $this->all();
    }

}
