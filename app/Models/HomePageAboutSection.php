<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomePageAboutSection extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public $timestamps = false;

    protected $fillable = [
        'about_content',
        'about_image'
    ];
}