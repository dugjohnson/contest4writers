<?php namespace Contest\Http\Requests;

use Contest\Http\Requests\Request;

class CreatePublishedEntryRequest extends Request {

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
			'author' => 'required',
			'title' => 'required',
			'category' => 'required',
			'signed' => 'required',
			'publisher' => 'required',
			'editor' => 'required',
			'publicationMonth' => 'required'
		];
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
