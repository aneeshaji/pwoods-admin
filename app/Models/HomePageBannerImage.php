<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomePageBannerImage extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public $timestamps = false;

    protected $fillable = [
        'first_banner_image_name',
        'second_banner_image_name'
    ];
}
