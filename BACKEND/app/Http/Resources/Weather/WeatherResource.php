<?php
declare(strict_types=1);

namespace App\Http\Resources\Weather;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class MediaResource
 *
 * @category Resources
 * @package  App\Http\Resources

 */
class WeatherResource extends JsonResource
{

    /**
     * Indicates if the resource's collection keys should be preserved.
     *
     * @var boolean
     */
    public bool $preserveKeys = true;


    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id'          => $this->resource->id,
            'city'        => $this->resource->name,
			'createdAt'  => $this->resource->createdAt,
        ];

    }//end toArray()


}//end class
