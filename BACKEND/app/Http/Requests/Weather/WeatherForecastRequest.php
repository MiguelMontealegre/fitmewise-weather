<?php
declare(strict_types=1);

namespace App\Http\Requests\Weather;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class WeatherForecastRequest extends FormRequest
{
    public function rules(): array
    {
		return [
			'unit' => ['required', 'string'],
			'lat' =>	['required', 'numeric'],
			'lon' =>	['required', 'numeric']
		];
    }//end rules()


}//end class
