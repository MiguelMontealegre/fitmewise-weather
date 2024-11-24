<?php

namespace App\Clients\Weather;

use App\Clients\BaseClient;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class Client extends BaseClient
{
    protected string $baseUrl = 'https://api.openweathermap.org';


    public function getCityData(string $city, string $unit): mixed
    {
		$endpoint = "/data/2.5/weather";
		$appId = env('WEATHER_APP_ID');

        $request = $this->get("$this->baseUrl$endpoint?q=$city&units=$unit&APPID=$appId");

        if (! is_array($response = $request->json())) {
            throw ValidationException::withMessages(['Entity' => 'Error']);
        }

        if (! $request->successful()) {
            $message = $response['message'] ?? 'Unknown error';
            throw ValidationException::withMessages(['Entity' => $message]);
        }

        return $response;
    }


	public function getForecast(string $unit, string $lat, string $lon): mixed
    {
		$endpoint = "/data/2.5/forecast";
		$appId = env('WEATHER_APP_ID');

        $request = $this->get("$this->baseUrl$endpoint?lat=$lat&lon=$lon&units=$unit&APPID=$appId");

        if (! is_array($response = $request->json())) {
            throw ValidationException::withMessages(['Entity' => 'Error']);
        }

        if (! $request->successful()) {
            $message = $response['message'] ?? 'Unknown error';
            throw ValidationException::withMessages(['Entity' => $message]);
        }

        return $response;
    }
}
