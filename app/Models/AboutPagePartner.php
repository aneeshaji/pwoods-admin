<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutPagePartner extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public $timestamps = false;

    protected $fillable = [
        'partners_title',
        'partners_content',
    ];
}