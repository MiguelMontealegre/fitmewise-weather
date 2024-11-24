<?php

declare(strict_types=1);

namespace App\Http\Controllers\Weather;

use Exception;
use App\Models\Weather;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\Weather\WeatherRequest;
use App\Http\Resources\Weather\WeatherResource;
use App\Clients\Weather\Client as WeatherClient;
use App\Http\Requests\Weather\WeatherForecastRequest;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class WeatherController extends Controller
{
	public function getCurrent(WeatherRequest $request)
	{
		$city = $request->input('city');
		$unit = $request->input('unit');
		$result = app(WeatherClient::class)->getCityData($city, $unit);

		return response()->json($result)
					->setStatusCode(ResponseAlias::HTTP_OK);
	}


	public function getForecast(WeatherForecastRequest $request)
	{
		$lat = $request->input('lat');
		$lon = $request->input('lon');
		$unit = $request->input('unit');

		$result = app(WeatherClient::class)->getForecast($unit, $lat, $lon);

		return response()->json($result)
			->setStatusCode(ResponseAlias::HTTP_OK);
	}


}//end class