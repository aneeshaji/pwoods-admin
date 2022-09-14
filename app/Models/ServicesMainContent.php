<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicesMainContent extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public $timestamps = false;

    protected $fillable = [
        'main_title',
        'main_content',
        'banner_image'
    ];
}