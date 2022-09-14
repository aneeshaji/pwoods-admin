<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public $timestamps = false;

    protected $fillable = [
        'main_title',
        'banner_image',
        'first_content_title',
        'first_content',
        'second_content_title',
        'second_content',
        'second_content_image',
        'feature_image_title_1',
        'feature_image_name_1',
        'feature_image_title_2',
        'feature_image_name_2',
        'feature_image_title_3',
        'feature_image_name_3'
    ];
}