<?php
declare(strict_types=1);

namespace App\Http\Controllers\Weather;

use App\Http\Controllers\Base\BaseDetail;
use App\Http\Resources\Weather\WeatherResource;
use App\Models\Weather;


class WeatherDetail extends BaseDetail
{

    /**
     * @var string
     */
    public string $modelClass = Weather::class;

    /**
     * @var string
     */
    public string $resourceClass = WeatherResource::class;


}//end class
