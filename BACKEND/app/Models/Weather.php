<?php

namespace App\Models;

use App\Traits\UuidTrait;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Weather extends Model
{
	use Searchable, UuidTrait, SoftDeletes;

	/**
     * @var string Rename created_at
     */
    const CREATED_AT = 'createdAt';
    /**
     * @var string Rename updated_at
     */
    const UPDATED_AT = 'updatedAt';
    /**
     * @var string Rename deleted_at
     */
    const DELETED_AT = 'deletedAt';



	/**
     * Rename Default Table Name
     *
     * @var string
     */
    protected $table = 'weather';

	

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];


	protected $casts = [];


	//------------------------------------------------------
    // MUTATORS
    //------------------------------------------------------


    /**
     * Overrides Searchable fields
     *
     * @return array
     */
    public function toSearchableArray(): array
    {
        return [
            'city'           => $this->city,
        ];

    }//end toSearchableArray()

}
