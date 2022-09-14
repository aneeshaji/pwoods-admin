<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public $timestamps = false;

    protected $fillable = [
        'project_name',
        'project_content',
        'project_year',
        'project_company',
        'project_location',
        'project_banner_image',
        'project_category'
    ];
}