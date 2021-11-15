<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class BlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
	{
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    #[ArrayShape([
		'name' => 'string',
		'digest' => 'string',
		'description' => 'string',
		'publish' => 'date'
	])]
	public function rules(): array
	{
        return [
			'name' => 'required',
            'digest' => 'required',
			'description' => 'required',
			'publish' => 'required'
        ];
    }

	#[ArrayShape([
		'name' => 'string',
		'digest' => 'string',
		'description' => 'string',
		'publish' => 'date'
	])]
	public function attributes(): array
	{
		return [
			'name' => 'Название записи',
			'digest' => 'Краткий текст записи',
			'description' => 'Полный текст записи',
			'publish' => 'Дата публикации записи'
		];
	}
}
