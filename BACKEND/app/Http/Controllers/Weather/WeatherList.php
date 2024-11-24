<?php
declare(strict_types=1);

namespace App\Http\Controllers\Weather;

use App\Models\Weather;
use App\QueryFilters\Pagination;
use App\Http\Controllers\Base\ScoutList;
use App\Http\Requests\PaginationRequest;
use Illuminate\Contracts\Container\Container;
use App\Http\Resources\Weather\WeatherResource;

class WeatherList extends ScoutList
{

    /**
     * @var string
     */
    public string $modelClass = Weather::class;

    /**
     * @var string
     */
    public string $resourceClass = WeatherResource::class;

    /**
     * @var string
     */
    public string $requestClass = PaginationRequest::class;


    /**
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->filters = [
            Pagination::class,
        ];
        parent::__construct($container);

    }//end __construct()


}//end class
