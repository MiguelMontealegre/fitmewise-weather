<?php
declare(strict_types=1);

namespace App\Http\Controllers\Weather;

use App\Http\Controllers\Base\BaseDelete;
use App\Models\Weather;

class WeatherDelete extends BaseDelete
{

    /**
     * @var string
     */
    public string $modelClass = Weather::class;

}//end class
