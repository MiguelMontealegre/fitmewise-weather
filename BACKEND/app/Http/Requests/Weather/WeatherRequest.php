<?php
declare(strict_types=1);

namespace App\Http\Requests\Weather;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class WeatherRequest extends FormRequest
{


    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;

    }//end authorize()


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
			'city' => ['required', 'string'],
			'unit' => ['required', 'string'],
        ];

    }//end rules()


}//end class
