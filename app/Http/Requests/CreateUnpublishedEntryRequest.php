<?php namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;


class CreateUnpublishedEntryRequest extends FormRequest {

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
			'authorEmail'  => 'required|email',
			'author2Email'  => 'nullable|email',
			'title' => 'required',
			'category' => 'required',
			'readRules' => 'required',
			'signed' => 'required',
			'filename' => 'required'
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
