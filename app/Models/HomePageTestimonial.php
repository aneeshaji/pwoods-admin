<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomePageTestimonial extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public $timestamps = false;

    protected $fillable = [
        'author_name',
        'author_designation',
        'content'
    ];
}